<?php

namespace NeewBee\Http\Controllers;

use Auth;
use NeewBee\Models\User;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class AuthController extends Controller
{
    public function registro()
    {
    	return view('auth.registro');
    }

    public function datosRegistro(Request $request)
    {
    	$this->validate($request, [
            'nombre' => 'required|max:60',
            'apellidos' => 'required|max:80',
            'email' => 'required|unique:users|email|max:200',
            'password' => 'required|min:6',
    		]);

    	User::create([
            
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
             'password' => bcrypt($request->input('password')),
    		]);

    	return redirect()->route('home')->with('info', 'Tu cuenta ha sido creada, ahora puedes loguearte');
    }
}
