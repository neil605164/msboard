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

        #刪除資料庫中的「資料」
        foreach ($photo_info as $my_check_photo) {
            
            $photos = DB::table('photos')->select('path')->where('id', '=', $my_check_photo)->get();
            Storage::delete($photos[0]->path);
            DB::table('photos')->where('id', '=', $my_check_photo)->delete();
            
        }
       


        /*
        必須要redirect回到showPhoto()的function，這樣才能重新取照片加上顯示
        如果不懂可將下方住解去掉，並查看網址並非導向showPhoto，而是導向deletePhoto
        */
        #return view(MyPhoto.myPhoto);
        return redirect()->action('MyPhotoController@showPhoto');
    }
}
