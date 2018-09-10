<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;

class MainController extends Controller
{
    
    public function index()
    {
        
        $models = Advert::orderBy('created_at', 'desc')->paginate(5);
        
        return view('main.index', ['models' => $models]);
    }
    
    public function show($id)
    {
        $model = Advert::with('user')->find($id);
        
        if (is_null($model)) {
            
            return redirect('/');
            
        }
        
        return view('main.show', ['model' => $model]);
    }
}
