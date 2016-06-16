<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [

     'uses' => '\NeewBee\Http\Controllers\HomeController@inicio',
     'as' => 'home',
	]);

/*Alertas */

Route::get('/alertas', function()
{
   return redirect()->route('home')->with('info', 'Estas registrado');
});

/* Registro */

Route::get('/registro', [
    
    'uses' => '\NeewBee\Http\Controllers\AuthController@registro',
    'as' => 'auth.registro',
    'middleware' => ['guest'],
	]);

Route::post('/registro', [
    
    'uses' => '\NeewBee\Http\Controllers\AuthController@datosRegistro',
    'middleware' => ['guest'],
	]);

/* Login */

Route::get('/login', [
     
    'uses' => '\NeewBee\Http\Controllers\AuthController@login',
    'as' => 'auth.login',
    'middleware' => ['guest'],
	]);

Route::post('/login', [
     
    'uses' => '\NeewBee\Http\Controllers\AuthController@validarDatosLogin',
    'middleware' => ['guest'],
	]);

/* Salir */

Route::get('/salir', [

    'uses' => '\NeewBee\Http\Controllers\AuthController@salir',
    'as' => 'salir',
    ]);

/* Buscar */

Route::get('/buscar', [

    'uses' => '\NeewBee\Http\Controllers\BuscarController@obtenerResultados',
    'as' => 'buscar.resultados',
    ]);

/* Perfil */

Route::get('/usuario/{nombre}', [

    'uses' => '\NeewBee\Http\Controllers\PerfilController@perfil',
    'as' => 'usuario.perfil',
    ]);

