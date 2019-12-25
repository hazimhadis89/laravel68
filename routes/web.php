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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace'=>'Web'], function() {
    Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index']);
    Route::get('/oauth2', ['as'=>'oauth2', 'uses'=>'HomeController@oauth2']);
    Route::resource('posts', 'PostController');
});
