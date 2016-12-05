<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use auth;
use Storage;
use App\photos;

class MyPhotoController extends Controller
{
    public function showPhoto()
    {
    	#呼叫登入者的資訊，用變數user儲存
    	$user  = Auth::user();

    	#建立一個新物建
    	$photo = DB::table('photos')->where('user_id', '=', $user->id)->get();
    	
    	$data  = ['users' => $user, 'photos' => $photo];
    	return view('MyPhoto.showPhoto', $data);
    }

    public function deletePhoto(Request $request)
    {
        $photo_info = $request->input('check_array');
        $photo_name = $request->input('photo_name'); 
        var_dump($photo_name);
        die();
        #刪除資料庫中的「資料」
        /*foreach ($photo_info as $my_check_photo) {
            DB::table('photos')->where('id', '=', $my_check_photo)->delete();
        }*/

        #找到勾選的該筆資料

            #刪除目錄中的「檔案」
            Storage::delete($photo_info[0]);
        
        
        

        /*
        必須要redirect回到showPhoto()的function，這樣才能重新取照片加上顯示
        如果不懂可將下方住解去掉，並查看網址並非導向showPhoto，而是導向deletePhoto
        */
        #return view(MyPhoto.myPhoto);
        return redirect()->action('MyPhotoController@showPhoto');
    }
}
