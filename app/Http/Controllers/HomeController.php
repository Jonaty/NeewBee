<?php

namespace NeewBee\Http\Controllers;

use Illuminate\Http\Request;

use NeewBee\Http\Requests;

class HomeController extends Controller
{
   public function inicio()
   {
   	return view('home');
   }
}
