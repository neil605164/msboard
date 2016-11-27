<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use Storage;
use App\information;
use App\User;
use App\Photo;

class InformationController extends Controller
{
    public function showInfo()
    {
        #呼叫登入者的資訊，用變數user儲存
    	$user = Auth::user();

        #呼叫與user資料表相同id的information、photo資料表裡面的資料
        $info = DB::table('information')->where('user_id', '=', $user->id)->get();
        #$photo = DB::table('photos')->where('user_id', '=', $user->id)->get();
        $photo = DB::table('photos')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();

        #將變數存成陣列
    	$data = ['users' => $user, 'infos' => $info, 'photos' => $photo];
    	return view('information.showInfo', $data);
    }

    public function postInfo(Request $request)
    {
    	#建立一個新務建，儲存資料表欄位
    	$information = new information;
        $photo = new photo;

        #將頁面傳送過來的值，存入對應的資料表欄位
        #information資料表的資訊
        $information->name = $request->name;
        $information->discription = $request->discription;
        $information->type = $request->type;
        $information->user_id = $request->user_id;

        #photo資料表的資訊，內容可以使用var_dump($fileName)觀察
        $fileName = $_FILES['photo']['name'];

        #圖片儲存的路徑
        $destinationPath = '../storage/app';
        //$destinationPath = storage_path('app/public');
        $new_fileName = date("Ymd") . "_" . $fileName;
        
        #die($new_fileName);
   
        #在IF條件中判斷是否為第一筆資料，若是則用儲存，若不是則用修改
        $info_id = $request->info_id;


        #IF條件:有搜尋到information資料表有資料(用ID判斷)
        if($info_id){

            #找到對應的該筆資料
            $infos = information::find($info_id);

            $infos->name = $request->name;
            $infos->discription = $request->discription;
            $infos->type = $request->type;
            $infos->user_id = $request->user_id;

            #檢查是否有上傳檔案
            #檢查檔案上傳是否有效，若有則存入資料庫
            #更新information資訊後，若也有上傳圖片就一併儲存
            if($request->hasFile('photo')){
                if ($request->photo->isValid()) {
                
                    $photo->user_id = $request->user_id;
                    $photo->path = $new_fileName;
                    

                    #將檔案存至指定的資料夾
                    $request->file('photo')->move($destinationPath, $new_fileName);
                    #存入photo資料庫
                    $photo->save();
                    
                }
            }

        	#如果有存入information儲存資料
        	if($infos->save()){
                return redirect('/showInfo');
                #return view('information.showInfo');
            }
        }
        else{

            #檢查是否有上傳檔案
            #檢查檔案上傳是否有效，若有則存入資料庫
            if($request->hasFile('photo')){
                if ($request->photo->isValid()) {
                
                    $photo->user_id = $request->user_id;
                    $photo->path = $new_fileName;
                    

                    #將檔案存至指定的資料夾
                    $request->file('photo')->move($destinationPath, $new_fileName);
                    #存入photo資料庫
                    $photo->save();
                    
                }
            }

            #儲存資料
            if($information->save()){
                return redirect('/showInfo');
            }
        }
        
    }
}
