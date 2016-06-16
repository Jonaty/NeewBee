<?php

namespace NeewBee\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class HomeController extends Controller
{
   public function inicio()
   {
   	if(Auth::check())
   	{
   		return view('timeline.inicio');
   	}
   	return view('home');
   }
}
