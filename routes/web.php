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

	if(!auth::guest()){
		#呼叫登入者的資訊，用變數user儲存
	    $user = Auth::user();

	    #呼叫與user資料表相同id的information、photo資料表裡面的資料
	    $info = DB::table('information')->where('user_id', '=', $user->id)->get();
	    #$photo = DB::table('photos')->where('user_id', '=', $user->id)->get();
	    $photo = DB::table('photos')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();

	    $data = ['infos' => $info, 'photos' => $photo];

    
    	return view('/layouts.main', $data);
	}
	else{

		$info = DB::table('information')->get();
		$photo = DB::table('photos')->orderBy('created_at', 'desc')->first();

		$data = ['infos' => $info, 'photos' => $photo];
		return view('/layouts.main', $data);
	}
});

Auth::routes();

/*登入機制管制
information:
showInfo
*/
Route::get('/showInfo', ['middleware' => 'auth', 'uses' => 'InformationController@showInfo']);
Route::post('/postInfo', ['middleware' => 'auth', 'uses' => 'InformationController@postInfo']);
