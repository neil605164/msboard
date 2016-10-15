<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InformationController extends Controller
{
    public function showInfo()
    {
    	return view('information.showInfo');
    }
}
