<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use App\msboard;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth::guest()){
        #呼叫登入者的資訊，用變數user儲存
        $user        = Auth::user();

        #呼叫與user資料表相同id的information、photo資料表裡面的資料
        $info        = DB::table('information')->where('user_id', '=', $user->id)->get();
        #抓放在大頭貼的照片
        $photo       = DB::table('photos')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();
        #抓全部的照片
        $all_photo   = DB::table('photos')->where('user_id', '=', $user->id)->get();
        #抓全部的留言
        #取得陣列空值...改成用find取值
        $all_message = DB::table('msboards')->where('user_id', '=', $user->id)->get();
        //dd($all_message);


        $data = ['infos' => $info, 'photos' => $photo, 'all_photos' => $all_photo, 'user' =>$user, 'message' => $all_message];

        return view('/layouts.main', $data);
    }
    else{

        $info = DB::table('information')->get();
        $photo = DB::table('photos')->orderBy('created_at', 'desc')->first();
        $all_photo = DB::table('photos')->get();
        $all_message = DB::table('msboards')->get();

        $data = ['infos' => $info, 'photos' => $photo, 'all_photos' => $all_photo, 'message' => $all_message];
        return view('/layouts.main', $data);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->input('content');
        $user_id = $request->input('user_id');
        $type    = $request->input('type');
        echo $type;
        exit;   

        $msboard = new msboard;
        $msboard->content = $content;
        $msboard->user_id = $user_id;

        if($msboard->save()){
           return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
