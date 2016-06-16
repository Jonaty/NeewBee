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

    <!--Mensaje cuando se envia la solicitud de amistad a un usuario -->
	@if(Auth::user()->tenerSolicitudesAmigosPendientes($user))
	<br>
	  <p style="font-size:18px;">Esperando por <strong>{{ $user->nombre() }}</strong> para aceptar tu solicitud de amistad</p>
	  <hr>

    <!--Boton para aceptar la solicitud de amistad -->
	@elseif(Auth::user()->tenerSolicitudesAmigosRecibidas($user))
	<br>
	   <a href="{{ route('amigos.aceptar', ['nombre' => $user->nombre]) }}" class="btn btn-primary">Aceptar solicitud de amistad</a>

    <!-- Mensaje cuando aceptas la solicitud de amistad -->
	@elseif(Auth::user()->tieneAmigosCon($user))
	<br>
	   <p>Tú y {{ $user->nombre() }} son amigos</p>

    <!-- Boton para agregar a un usuario como amigo -->
	 @elseif(Auth::user()->id !== $user->id)
	 <br>
	   <a href="{{ route('amigos.agregar', ['nombre' => $user->nombre]) }}" class="btn btn-primary">Agregar como amigo</a>
	   
	@endif
	
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