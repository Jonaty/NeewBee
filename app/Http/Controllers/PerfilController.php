<?php

namespace NeewBee\Http\Controllers;

use Auth;
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

/*Actualizar Perfil */

    public function actualizarDatosPerfil()
    {
       return view('usuario.editar');
    }

    public function obtenerDatosActualizar(Request $request)
    {
    	$this->validate($request, [

            'fec_nac' => '',
            'edad' => '',
            'nacionalidad' => '',
            'est_civ' => '',
            'direccion' => 'max:200',
            'telefono' => 'alpha_num|max:10',
            'tel_contacto' => 'alpha_num|max:10',
            'niv_acad' => '',
            'carrera' => 'max:60',
            'ocupacion' => 'required',
            'nombre_ocup' => 'max:50',
            'exp_lab' => 'max:1000',
            'form_acad' => 'max:1000',
            'cursos' => 'max:1000',
            'certificaciones' => 'max:1000',
            'idiomas' => 'max:1000',
            'aptitudes' => 'max:1000',
            'info_adic' => 'max:1000',
            ]);

      Auth::user()->update([
        'fec_nac' => $request->input('fec_nac'),
        'edad' => $request->input('edad'),
        'nacionalidad' => $request->input('nacionalidad'),
        'est_civ' => $request->input('est_civ'),
        'direccion' => $request->input('direccion'),
        'telefono' => $request->input('telefono'),
        'tel_contacto' => $request->input('tel_contacto'),
        'niv_acad' => $request->input('niv_acad'),
        'carrera' => $request->input('carrera'),
        'ocupacion' => $request->input('ocupacion'),
        'nombre_ocup' => $request->input('nombre_ocup'),
        'exp_lab' => $request->input('exp_lab'),
        'form_acad' => $request->input('form_acad'),
        'cursos' => $request->input('cursos'),
        'certificaciones' => $request->input('certificaciones'),
        'idiomas' => $request->input('idiomas'),
        'aptitudes' => $request->input('aptitudes'),
        'info_adic' => $request->input('info_adic'),
        ]);

      return redirect()->route('perfil.editar')->with('info', 'Datos Actualizados');
    }

}

?>