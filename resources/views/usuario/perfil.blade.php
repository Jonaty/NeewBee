@extends('templates.main')

@section('title', 'Perfil')

@section('content')

<div class="row">
	<div class="col-lg-5">
		<!-- Informacion de usuario y status -->
       	<h4>Perfil</h4>
		@include('usuario.partials.usuarioblock')
		<hr>		

	</div>

	<div class="col-lg-4 col-lg-offset-3">	
	<!-- Amigos y solicitudes de amigos -->

	

	</div>
</div>

@endsection