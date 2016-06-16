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
