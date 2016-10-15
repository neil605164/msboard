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


#登入機制管制
#Route::get('/account', 'HomeController@index');

/*Route::get('/account', ['middleware' => 'auth', function () {
    //
}]);*/

/*
information:
index_info
*/

Route::get('/info', 'InformationController@index');