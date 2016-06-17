<?php

namespace NeewBee\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

use NeewBee\Http\Requests;

class PdfController extends Controller
{
   public function verpdf()
    {
    	$pdf = PDF::loadView('usuario.curriculum');
    	return $pdf->download('curriculum.pdf');
    }
}

?>