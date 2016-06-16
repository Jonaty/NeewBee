<?php

namespace NeewBee\Http\Controllers;

use Illuminate\Http\Request;

use NeewBee\Models\User;
use NeewBee\Http\Requests;

class PerfilController extends Controller
{
    public function perfil($nombre)
    {
       $user = User::where('nombre', $nombre)->first();

    	if(!$user)
    	{
    		abort(404);
    	}
    	return view('usuario.perfil')->with('user', $user);
    }
}

?>