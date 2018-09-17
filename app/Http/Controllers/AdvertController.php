<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertRequest;
use Illuminate\Support\Facades\Auth;
use App\Advert;

class AdvertController extends Controller
{
    public function create()
    {
        $model = new Advert;
        return view('advert.create')->with([
            'model' => $model
        ]);
    }

    public function createPost(AdvertRequest $request)
    {
        $model = new Advert();
        $model->fill($request->all());
        $model->user_id = Auth::user()->id;
        if ($model->save()) {
            return redirect(route('main.show', ['id' => $model->id]));
        }
        return view('advert.create')->with([
            'model' => $model
        ]);
    }

    public function update($id)
    {
        if (!$model = $this->getModel($id)) {
            return redirect('/');
        }
        return view('advert.update')->with([
            'model' => $model
        ]);
    }

    public function updatePost($id, AdvertRequest $request)
    {
        if (!$model = $this->getModel($id)) {
            return redirect('/');
        }
        $model->fill($request->all());
        if ($model->save()) {
            $request->session()->flash('message', 'advert update');
            return redirect(route('advert.update', ['id' => $model->id]));
        }
        return view('advert.update')->with([
            'model' => $model
        ]);
    }

    public function delete($id)
    {
        if ($model = $this->getModel($id)) {
            $model->delete();
        }
        return redirect('/');
    }

    private function getModel($id)
    {
        return Advert::where('id', $id)->where('user_id', Auth::id())->first();
    }
}
