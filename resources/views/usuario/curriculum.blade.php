@extends('templates.main')

@section('title', 'Home')

@section('content')

<h2>Curriculum Vitae</h2>
<hr>
<h3>Información Personal</h3>
<br>
<p><strong>Nombre: </strong>{{ Auth::user()->nombre() }}</p>
<p><strong>Edad: </strong>{{ Auth::user()->edad() }}</p>
<p><strong>Estado Civil: </strong>{{ Auth::user()->est_civ() }}</p>
<p><strong>Nacionalidad: </strong>{{ Auth::user()->nacionalidad() }}</p>
<p><strong>Dirección: </strong>{{ Auth::user()->direccion() }}</p>
<p><strong>Correo: </strong>{{ Auth::user()->email() }}</p>
<p><strong>Teléfono: </strong>{{ Auth::user()->telefono() }}</p>
<p><strong>Teléfono Contacto Externo: </strong>{{ Auth::user()->tel_contacto() }}</p>
<hr>
<h3>Información Académica</h3>
<br>
<p><strong>Nivel Académico: </strong>{{ Auth::user()->niv_acad() }}</p>
<p><strong>Carrera: </strong>{{ Auth::user()->carrera() }}</p>
<p><strong>Ocupación: </strong>{{ Auth::user()->ocupacion() }}</p>
<p><strong>Nombre de la Ocupación: </strong>{{ Auth::user()->nombre_ocup() }}</p>
<hr>
<h3>Cursos</h3>
<br>
<p>{{ Auth::user()->cursos() }}</p>
<hr>

<h3>Certificaciones</h3>
<br>
<p>{{ Auth::user()->certificaciones() }}</p>
<hr>


<h3>Idiomas</h3>
<br>
<p>{{ Auth::user()->idiomas() }}</p>
<hr>

<h3>Aptitudes</h3>
<br>
<p>{{ Auth::user()->aptitudes() }}</p>
<hr>

<h3>Información Adicional</h3>
<br>
<p>{{ Auth::user()->info_adic() }}</p>

@endsection