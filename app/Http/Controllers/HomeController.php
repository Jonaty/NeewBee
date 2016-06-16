<?php

namespace NeewBee\Http\Controllers;

use Auth;
use NeewBee\Models\Publicacion;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class HomeController extends Controller
{
    public function inicio()
    {

    	if(Auth::check())
    	{
    		$publicaciones = Publicacion::notReply()->where(function($query)
    		{
    			return $query->where('usuario_id', Auth::user()->id)->orWhereIn('usuario_id', Auth::user()->amigos()->lists('id'));

    		})->orderBy('created_at', 'desc')->paginate(10);

    		return view('timeline.inicio')->with('publicaciones', $publicaciones);
    	}
    	return view('home');
    }
}