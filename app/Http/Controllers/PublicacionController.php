<?php

namespace NeewBee\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class PublicacionController extends Controller
{
    public function publicarAlgo(Request $request)
    {
     $this->validate($request, ['publicacion' => 'required|max:1000',]);

     Auth::user()->publicaciones()->create(['publicacion' => $request->input('publicacion'), 
     ]);

     return redirect()->route('home')->with('info', 'Publicacion exitosa');
    }
}
