<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use PragmaRX\Google2FA\Google2FA;
class OauthController extends Controller
{
    
    /*
    *產生一個QR Code圖片
    *QR Code存放名稱、信箱、QR Code密碼
    *
    *
    */
    public function showQRCode()
    {
        //$global $user;
        $user = Auth::user();
        $google2fa = new Google2FA();
        $google2fa = $google2fa->getQRCodeGoogleUrl(
            'Neil_Hsieh_QR_Code',
            $user->email,
            $user->secret
        );

        $data = ['google2fa' => $google2fa];
        return view('Oauth.Oauth', $data);
    }

    /*
    *接收前端輸入驗證碼欄位的值
    *接著用verifyKey()進行比對
    *若比對相同就登入成功
    *錯誤就顯是驗證碼錯誤的訊息
    */
    public function Verify(Request $request)
    {
        $user = Auth::user();
        $google2fa = new Google2FA();
        $myCode = $request->input('mycode');
        $valid  = $google2fa->verifyKey($user->secret, $myCode);
        return redirect('/');
    }
}
https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=otpauth%3A%2F%2Ftotp%2FNeil_Hsieh_QR_Code%3Aneil605164%40yahoo.com.tw%3Fsecret%3D6KOIWZK5LABNTPDJ%26issuer%3DNeil_Hsieh_QR_Code