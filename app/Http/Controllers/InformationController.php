<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InformationController extends Controller
{
    public function index()
    {
    	return view('information.info');
    }
}
