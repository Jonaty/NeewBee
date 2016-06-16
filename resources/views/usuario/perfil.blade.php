@extends('templates.main')

@section('title', 'Perfil')

@section('content')

<div class="row">
	<div class="col-lg-5">
		<!-- Informacion de usuario y status -->
       	<h4>Perfil</h4>
		@include('usuario.partials.usuarioblock')
		<hr>
       
        @if(!$publicaciones->count())
        <p>{{ $user->nombre() }} no tiene nada publicado todavía</p>

      @else
          
         @foreach($publicaciones as $publicacion)
         
         <div class="media">
         	<a href="{{ route('usuario.perfil', ['nombre' => $publicacion->usuario->nombre]) }}" class="pull-left">
         		<img src="{{ $publicacion->usuario->avatarUrl() }}" alt="{{ $publicacion->usuario->nombre() }}" class="media-object">
         	</a>
      
         <div class="media-body">
         	<h4 class="media-heading"><a href="{{ route('usuario.perfil', ['nombre' => $publicacion->usuario->nombre]) }}">{{ $publicacion->usuario->nombre() }}</a></h4>
         	<p>{{ $publicacion->publicacion }}</p>
         	<ul class="list-inline">
         		<li>{{ $publicacion->created_at->diffForHumans() }}</li>
         		<li><a href="#">Me gusta</a></li>
         		<li>10 Me gusta</li>
         	</ul>
         
         @foreach($publicacion->respuestas as $respuesta)
         <div class="media">
         	<a href="{{ route('usuario.perfil', ['nombre' => $respuesta->usuario->nombre]) }}" class="pull-left">
         		<img src="{{ $respuesta->usuario->avatarUrl() }}" alt="{{ $respuesta->usuario->nombre() }}" class="media-object">
         	</a>

         	<div class="media-body">
         		<h5 class="media-heading"><a href="{{ route('usuario.perfil', ['nombre' => $respuesta->usuario->nombre]) }}">{{ $respuesta->usuario->nombre() }}</a></h5>
         		<p>{{ $respuesta->publicacion }}</p>
         		<ul class="list-inline">
         			<li>{{ $respuesta->created_at->diffForHumans() }}</li>
         			<li><a href="">Like</a></li>
         			<li>10 Me gusta</li>
         		</ul>
         	</div>
         </div>
         @endforeach


         @if($authUsuarioIsAmigo || Auth::user()->id === $publicacion->usuario->id)
         <form action="{{ route('posteo.respuesta', ['statusId' => $publicacion->id]) }}" role="form" method="post">
         	<div class="form-group{{ $errors->has("reply-{$publicacion->id}") ? ' has-error' : '' }}">
         		<textarea name="reply-{{ $publicacion->id }}" rows="2" class="form-control" placeholder="Comenta este estado"></textarea>
              
              @if ($errors->has("reply-{$publicacion->id}"))
              <span class="help-block">{{ $errors->first("reply-{$publicacion->id}") }}</span>
              @endif

         	</div>

         	<input type="submit" value="Comentar" class="btn btn-primary btn-sm">

         	<input type="hidden" name="_token" value="{{ Session::token() }}">
         </form>
         @endif

         </div>
     </div>

         @endforeach

      @endif
		
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