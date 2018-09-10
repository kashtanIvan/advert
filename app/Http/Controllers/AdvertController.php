<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Advert;

class AdvertController extends Controller
{
    public function create() {
        $model = new Advert;
        return view('advert.create')->with([
            'model' => $model
            ]);
    }
    
    public function createPost(Request $request) {
        
        $model = new Advert();
        
        $postData = $request->post();
        
        $postData['user_id'] = Auth::user()->id;
        
        $validator = Validator::make($postData, $model->rules);
        
        if (!$validator->fails()) {
            
            $model->fill($postData);
            
            if ($model->save()) {
                
                return redirect(route('main.show', ['id' => $model->id]));
                
            }
            
        }
        
        return view('advert.create')->with([
            'model' => $model
            ])->withErrors($validator->errors());
    }
    
    public function update($id) {
        
        if (!$model = $this->getModel($id)) {
            
            return redirect('/');
            
        }
        
        return view('advert.update')->with([
            'model' => $model
            ]);
    }
    
    public function updatePost($id, Request $request) {
        
        if (!$model = $this->getModel($id)) {
            
            return redirect('/');
            
        }
        
        $postData = $request->post();
        
        $validator = Validator::make($postData, $model->rules);
        
        if (!$validator->fails()) {
            
            $model->fill($postData);
            
            if ($model->save()) {
                $request->session()->flash('message', 'advert update'); 
                return redirect(route('advert.update', ['id' => $model->id]));
                
            }
            
        }
    }
    
    public function delete($id) {
        
        if ($model = $this->getModel($id)) {
            
            $model->delete();
            
        }
        
        return redirect('/');

    }
    
    
    private function getModel($id) {
        
        return Advert::where(['id' => $id, 'user_id' => Auth::user()->id])->first();
        
    }
}
