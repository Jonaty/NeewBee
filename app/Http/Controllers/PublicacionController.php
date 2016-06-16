<?php

namespace NeewBee\Http\Controllers;

use Auth;
use NeewBee\Models\User;
use NeewBee\Models\Publicacion;
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

    public function postReply(Request $request, $statusId)
    {
    	$this->validate($request, [

            "reply-{$statusId}" => 'required|max:1000',
    		],
            [
            'required' => 'El comentario es requerido'
            ]);

          $status = Publicacion::notReply()->find($statusId);

          if(!$status)
          {
          	return redirect()->route('home');
          }

          if(!Auth::user()->tieneAmigosCon($status->usuario) && Auth::user()->id !== $status->usuario->id)
          {
          	return redirect()->route('home');
          }
    	
    	$respuesta = Publicacion::create([
            'publicacion' => $request->input("reply-{$statusId}"),
    		])->usuario()->associate(Auth::user());

    	$status->respuestas()->save($respuesta);

    	return redirect()->back();
    }
}
