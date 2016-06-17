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

          $publicacion = Publicacion::notReply()->find($statusId);

          if(!$publicacion)
          {
          	return redirect()->route('home');
          }

          if(!Auth::user()->tieneAmigosCon($publicacion->usuario) && Auth::user()->id !== $publicacion->usuario->id)
          {
          	return redirect()->route('home');
          }
    	
    	$respuesta = Publicacion::create([
            'publicacion' => $request->input("reply-{$statusId}"),
    		])->usuario()->associate(Auth::user());

    	$publicacion->respuestas()->save($respuesta);

    	return redirect()->back();
    }

    public function obtenerMeGusta($statusId)
    {
      $publicacion = Publicacion::find($statusId);

      if(!$publicacion)
      {
        return redirect()->route('home');
      }

      if(!Auth::user()->tieneAmigosCon($publicacion->usuario))
      {
        return redirect()->route('home');
      }

      if(Auth::user()->tenerMeGusta($publicacion))
      {
        return redirect()->back();
      }

      $like = $publicacion->likes()->create([]);

      Auth::user()->likes()->save($like);

      return redirect()->back();
    }
}
