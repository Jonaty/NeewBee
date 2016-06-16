<?php

namespace NeewBee\Http\Controllers;

use DB;
use NeewBee\Models\User;
use Illuminate\Http\Request;
use NeewBee\Http\Requests;

class BuscarController extends Controller
{
     public function obtenerResultados(Request $request)
    {
    	$query = $request->input('query');
    	
    	if(!$query)
    	{
    		return redirect()->route('home');
    	}	

    	$users = User::where(DB::raw("CONCAT(nombre, ' ', apellidos)"), 'LIKE', "%{$query}%")->get();

    	return view('buscar.resultados')->with('users', $users);
    }
}
