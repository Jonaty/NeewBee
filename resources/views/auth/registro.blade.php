@extends('templates.main')

@section('title', 'Registro')

@section('content')

<h2>¡Registrate Ahora!</h2>
<hr>
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('auth.registro') }}" class="form-vertical" role="form" method="post">
            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : ''}}">
                <label for="nombre" class="control-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ Request::old('nombre') ?: '' }}">

                @if($errors->has('nombre'))
                <span class="help-block">{{ $errors->first('nombre') }}</span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : ''}}">
                <label for="apellidos" class="control-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ Request::old('apellidos') ?: '' }}">

                @if($errors->has('apellidos'))
                <span class="help-block">{{ $errors->first('apellidos') }}</span>
                @endif

            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                <label for="email" class="control-label">Correo Electrónico</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ Request::old('email') ?: '' }}">

                @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                <label for="password" class="control-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ Request::old('password') ?: '' }}">

                @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif

            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Registrarse</button>
            </div>

            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@endsection