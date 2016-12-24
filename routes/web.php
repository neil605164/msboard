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

/*
可以將function獨立出來,就像第17行
登入機制管制
msboard:
msboard
*/
Route::get('/', 'MainController@index');
/*Route::post('/PB_message', function () {
    return view('layouts.main');
});*/
#Route::post('/PB_message', 'MainController@store');
Route::post('/PB_message', 'MainController@store');
/*Route::get('/', function () {

	if(!auth::guest()){
		#呼叫登入者的資訊，用變數user儲存
	    $user      = Auth::user();

	    #呼叫與user資料表相同id的information、photo資料表裡面的資料
	    $info      = DB::table('information')->where('user_id', '=', $user->id)->get();
	    #抓放在大頭貼的照片
	    $photo     = DB::table('photos')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();
	    #抓全部的照片
	    $all_photo = DB::table('photos')->where('user_id', '=', $user->id)->get();

	    $data = ['infos' => $info, 'photos' => $photo, 'all_photos' => $all_photo];

    
    	return view('/layouts.main', $data);
	}
	else{

		$info = DB::table('information')->get();
		$photo = DB::table('photos')->orderBy('created_at', 'desc')->first();
		$all_photo = DB::table('photos')->get();

		$data = ['infos' => $info, 'photos' => $photo, 'all_photos' => $all_photo];
		return view('/layouts.main', $data);
	}
});*/

Auth::routes();

/*登入機制管制
Oauth:
Oauth
*/
Route::get('/Oauth', ['middleware' => 'auth', 'uses' => 'OauthController@showQRCode']);
Route::post('/Verify', ['middleware' => 'auth', 'uses' => 'OauthController@Verify']);

/*登入機制管制
information:
showInfo
*/
Route::get('/showInfo', ['middleware' => 'auth', 'uses' => 'InformationController@showInfo']);
Route::post('/postInfo', ['middleware' => 'auth', 'uses' => 'InformationController@postInfo']);


/*登入機制管制
MyPhoto:
myPhoto
*/
/*Route::get('/showPhoto', function () {
	return view ('MyPhoto.showPhoto');        
});*/
#Route::get('/showPhoto', 'MyPhotoController@showPhoto');
Route::get('/showPhoto', ['middleware' => 'auth', 'uses' => 'MyPhotoController@showPhoto']);
Route::delete('/deletePhoto', ['middleware' => 'auth', 'uses' => 'MyPhotoController@deletePhoto']);

