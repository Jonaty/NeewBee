<?php

namespace NeewBee\Http\Controllers;

use Auth;
use NeewBee\Models\User;
use Illuminate\Http\Request;

use NeewBee\Http\Requests;

class CurriculumController extends Controller
{
    public function index()
    {
    	return view('usuario.curriculum');
    }
}
?>