<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use App\information;
use App\User;

class InformationController extends Controller
{
    public function showInfo()
    {
        #呼叫登入者的資訊，用變數user儲存
    	$user = Auth::user();

        #呼叫與user資料表相同id的information資料表裡面的資料
        //$info = information::find(5);
        $info = DB::table('information')->where('user_id', '=', $user->id)->get();
        
        #將變數存成陣列
    	$data = ['users' => $user, 'infos' => $info];
    	return view('information.showInfo', $data);
    }

    public function postInfo(Request $request)
    {
    	#建立一個新務建，儲存資料表欄位
    	$information = new information;

        #將頁面傳送過來的值，存入對應的資料表欄位
        $information->name = $request->name;
        $information->discription = $request->discription;
        $information->type = $request->type;
        $information->user_id = $request->user_id;

        #在IF條件中判斷是否為第一筆資料，若是則用儲存，若不是則用修改
        $info_id = $request->info_id;


        #IF條件:有搜尋到資料表有資料(用ID判斷)
        if($info_id){

            #找到對應的該筆資料
            $infos = information::find($info_id);

            $infos->name = $request->name;
            $infos->discription = $request->discription;
            $infos->type = $request->type;
            $infos->user_id = $request->user_id;

        	#儲存資料
        	if($infos->save()){
                return redirect('/showInfo');
                #return view('information.showInfo');
            }
        }

        #儲存資料
        if($information->save()){
            return redirect('/showInfo');
        }
    }
}
