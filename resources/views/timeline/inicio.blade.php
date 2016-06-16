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

		
	</div>
</div>
@endsection