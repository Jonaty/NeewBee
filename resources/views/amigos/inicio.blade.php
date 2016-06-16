@extends('templates.main')

@section('title', 'Home')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<h3>Mis Amigos</h3>
		<!-- Lista de amigos agregados -->

	@if(!$amigos->count())
	<p>No hay amigos agregados</p>

	@else

	  @foreach($amigos as $user)
	     @include('usuario.partials.usuarioblock')
	  @endforeach

	@endif

	</div>

	<div class="col-lg-6">
		<h3>Solicitudes de Amigos</h3>
		<!-- Lista de solicitudes de amigos -->



	</div>
</div>

@endsection