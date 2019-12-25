<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api', 'namespace'=>'Api'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Route::resource('posts', 'PostController');
    Route::get('posts', ['as'=>'posts.index','uses'=>'PostController@index']);
    Route::post('posts/create', ['as'=>'posts.store','uses'=>'PostController@store']);
    Route::get('posts/{post}', ['as'=>'posts.show','uses'=>'PostController@show']);
    Route::post('posts/{post}/edit', ['as'=>'posts.update','uses'=>'PostController@update']);
    Route::post('posts/{post}/delete', ['as'=>'posts.destroy','uses'=>'PostController@destroy']);
});
