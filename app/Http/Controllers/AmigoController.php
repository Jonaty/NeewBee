<?php

namespace NeewBee\Http\Controllers;

use Auth;
use NeewBee\Models\User;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class AmigoController extends Controller
{
    public function inicio()
    {
    	$amigos = Auth::user()->amigos();
    	

    	return view('amigos.inicio')->with('amigos', $amigos);
    }

   }
?>
