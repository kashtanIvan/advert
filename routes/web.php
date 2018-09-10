<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'MainController@index')->name('main.index');
Route::get('/{id}', 'MainController@show')->name('main.show')->where(['id' => '[0-9]+']);

Route::get('/edit', 'AdvertController@create')->middleware('auth')->name('advert.create');
Route::post('/edit', 'AdvertController@createPost')->middleware('auth')->name('advert.save');

Route::group(['prefix' => '/edit', 'middleware' => 'auth'], function () {
    Route::get('/{id}', 'AdvertController@update')->middleware('auth')->name('advert.update');
    Route::post('/{id}', 'AdvertController@updatePost')->middleware('auth'); //->name('advert.save');
});

Route::get('/delete/{id}', 'AdvertController@delete')->middleware('auth')->name('advert.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
