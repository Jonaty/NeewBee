@extends('templates.main')

@section('title', 'Buscar')

@section('content')

<h3>Resultados de: "{{ Request::input('query') }}"</h3>

@if(!$users->count())
<p>No se encontraron resultados</p>

@else
<div class="row">
	<div class="col-lg-12">

	    @foreach($users as $user)
		@include('usuario.partials.usuarioblock')
		@endforeach
	</div>
</div>

@endif

@endsection