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

    <!-- Lista de amigos agregados -->
	<h4>Amigos de <strong>{{ $user->nombre() }}</strong></h4>

	@if(!$user->amigos()->count())
	<p>{{ $user->nombre() }} no tiene amigos aún</p>

	@else

	  @foreach($user->amigos() as $user)
	     @include('usuario.partials.usuarioblock')
	  @endforeach

	@endif

	</div>
</div>

@endsection