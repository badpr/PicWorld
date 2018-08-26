<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public static function getHome(){
    	return view('welcome');
    }
}
