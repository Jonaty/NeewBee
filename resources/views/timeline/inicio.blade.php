@extends('templates.main')

@section('title', 'Inicio')

@section('content')
<!-- Panel de Publicaciones -->
<h3>Publica algo!</h3>
<div class="row">
	<div class="col-lg-6">
		<form action="{{ route('posteo') }}" method="post" role="form">

			<div class="form-group{{ $errors->has('publicacion') ? ' has->error' : ''  }}">

				<textarea name="publicacion" rows="3" placeholder="Publica algo importante {{ Auth::user()->nombre() }}" class="form-control"></textarea>

				@if ($errors->has('publicacion'))
				  <span class="help-block">{{ $errors->first('publicacion') }}</span>
				@endif
			</div>

			<button type="submit" class="btn btn-primary">Publicar</button>
             
             <input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
		<hr>
	</div>
</div>


<!-- Publicaciones ya hechas en la linea del tiempo -->
<div class="row">
	<div class="col-lg-5">
		<!--publicaciones y comentarios -->
      
      @if(!$publicaciones->count())
        <p>No hay publicaciones todavia</p>

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

         </div>
     </div>

         @endforeach

         {!! $publicaciones->render() !!}
      @endif
		
	</div>
</div>
@endsection