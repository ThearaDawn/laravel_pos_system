<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return 'home home home';
});

Route::get('/ddd', function () {
    return 'DDDDD';
})->middleware('CheckAdmin:1,a,b,data s');


Route::get('/signin','UserController@signin');
Route::post('/signin','UserController@post_signin');

Route::get('/signout','UserController@signout');

Route::get('/user','UserController@index');

Route::get('/user/form','UserController@form');
Route::get('/user/error','UserController@error');
Route::put('/user/form/{id}','UserController@edit');
Route::delete('/user/form/{id}','UserController@delete');
Route::post('/user/form','UserController@insert');
Route::patch('/user/form','UserController@update');

Route::get('/posts','PostsController@index');
Route::get('/posts/form','PostsController@form');
Route::post('/posts/form','PostsController@insert');

