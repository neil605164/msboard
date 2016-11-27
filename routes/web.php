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

    return view('/layouts.main');
});

Auth::routes();

/*登入機制管制
information:
info
showInfo
*/
Route::get('indexInfo', 'InformationController@indexInfo');
Route::get('/showInfo', ['middleware' => 'auth', 'uses' => 'InformationController@showInfo']);
Route::post('/postInfo', ['middleware' => 'auth', 'uses' => 'InformationController@postInfo']);
