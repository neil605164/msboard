@extends('information.information')
@section('showInfo')

<p><h2>i'm in Oauth</h2></p>
<form class="w3-container" role="form" method="POST" action="{{ url('/Verify') }}">
    {{ csrf_field() }}
    <div style="width: 210px; height: 210px; border: 2px solid black; border-radius: 5px; margin: 15px auto;">
        <img src="{{ $google2fa }}" alt="無法顯示QR_Code圖片">

    </div>

    <input type="text" name="mycode" style="margin: 0 auto; width: 200px; height: 35px; border: 1px solid black; border-radius: 3px;" placeholder="請輸入驗證碼">

    <p>
	    <button style="background-color: white; color: black; border: 2px solid black; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">確認送出</button>
	    <button style="background-color: white; color: black; border: 2px solid black; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">下載圖片</button>
    </p>
</form>
@endsection