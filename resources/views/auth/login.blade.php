@extends('templates.main')

@section('title', 'Login')

@section('content')

<h2>Entra ya!</h2>
<hr>
<div class="row">
	<div class="col-lg-6">
		<form action="{{ route('auth.login') }}" class="form-vertical" role="form" method="post">
			<div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
				<label for="email" class="control-label">Correo Electrónico</label>
				<input type="text" class="form-control" name="email" id="email">

				@if($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
				@endif

			</div>

			<div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
				<label for="password" class="control-label">Contraseña</label>
				<input type="password" class="form-control" name="password" id="password">

				@if($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
				@endif
				
			</div>

			<div class="checkbox">
				<label for="checkbox">
					<input type="checkbox" name="remember" id="checkbox">Recordarme
				</label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Entrar</button>
			</div>

			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
</div>

@endsection