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
    	$solicitudes = Auth::user()->solicitudesAmigos();

    	return view('amigos.inicio')->with('amigos', $amigos)->with('solicitudes', $solicitudes);
    }

    public function agregarAmigo($nombre)
    {
     $user = User::where('nombre', $nombre)->first();

    	if(!$user)
    	{
    		return redirect()->route('home')->with('info', 'Ese usuario no pudo ser encontrado');
    	}

    	if(Auth::user()->id === $user->id)
        {
            return redirect()->route('home');
        }


    if(Auth::user()->tenerSolicitudesAmigosPendientes($user) || $user->tenerSolicitudesAmigosPendientes(Auth::user()))
    	{
    		return redirect()->route('usuario.perfil', ['nombre' => $user->nombre])->with('info', 'La solicitud de amistad ahora esta pendiente');
    	}

    if(Auth::user()->tieneAmigosCon($user))
    	{
    		return redirect()->route('usuario.perfil', ['nombre' => $user->nombre])->with('info', 'Ahora son amigos');
    	}

    	Auth::user()->agregarAmigos($user);

    	return redirect()->route('usuario.perfil', ['nombre' => $nombre])->with('info', 'Solicitud de amistad enviada');
    }

 /*Aceptar solicitudes de amistad */

    public function aceptarAmigo($nombre)
    {
        $user = User::where('nombre', $nombre)->first();

        if(!$user)
        {
            return redirect()->route('home')->with('info', 'Ese usuario no pudo ser encontrado');
        }

        if(!Auth::user()->tenerSolicitudesAmigosRecibidas($user))
        {
            return redirect()->route('home');
        }

        Auth::user()->aceptarSolicitudAmigos($user);

        return redirect()->route('usuario.perfil', ['nombre' => $nombre])->with('info', 'Solicitud de amistad aceptada');
    }

    public function eliminarAmigo($nombre)
    {
      $user = User::where('nombre', $nombre)->first();

      if(!Auth::user()->tieneAmigosCon($user))
        {
            return redirect()->back();
        }

        Auth::user()->eliminarAmigo($user);

        return redirect()->back()->with('info', 'Amigo Eliminado');
    }



}
