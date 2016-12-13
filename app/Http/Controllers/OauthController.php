<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OauthController extends Controller
{
    public function showQRCode()
    {
        return view('Oauth.Oauth');
    }
}
