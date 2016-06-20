@extends('templates.main')

@section('title', 'Editar Info')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<form action="{{ route('perfil.editar') }}" class="form-vertical" role="form" method="post">
			<div class="row">
				<div class="col-lg-6 {{$errors->has('fec_nac') ? ' has-error' : '' }}">
					<label for="fec_nac" class="control-label">Fecha de Nacimiento</label>
					<input type="date" name="fec_nac" id="fec_nac" class="form-control" value="{{ Request::old('fec_nac') ?: Auth::user()->fec_nac }}">

					@if($errors->has('fec_nac'))
					<span class="help-block">{{ $errors->first('fec_nac') }}</span>
					@endif

				</div>
			</div>
          <br>
		<!--Edad -->

		<div class="row">
				<div class="col-lg-6 {{$errors->has('edad') ? ' has-error' : '' }}">
					<label for="edad" class="control-label">Edad</label>
					<input type="text" name="edad" id="edad" class="form-control" value="{{ Request::old('edad') ?: Auth::user()->edad }}">

					@if($errors->has('edad'))
					<span class="help-block">{{ $errors->first('edad') }}</span>
					@endif

				</div>
			</div>

             <br>

             <div class="row">
				<div class="col-lg-6 {{$errors->has('nacionalidad') ? ' has-error' : '' }}">
					<label for="nacionalidad" class="control-label">Nacionalidad</label>
					<input type="text" class="form-control" name="nacionalidad" id="nacionalidad" value="{{ Request::old('nacionalidad') ?: Auth::user()->nacionalidad }}">

					@if($errors->has('nacionalidad'))
					<span class="help-block">{{ $errors->first('nacionalidad') }}</span>
					@endif

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('est_civ') ? ' has-error' : '' }}">
				<label for="est_civ" class="control-label">Estado Civil</label>
					<select class="form-control" name="est_civ" value="{{ Request::old('est_civ') ?: Auth::user()->est_civ }}">
                      <option value="Soltero">Soltero</option>
                      <option value="Casado">Casado</option>
                    </select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('direccion') ? ' has-error' : '' }}">
					<label for="direccion" class="control-label">Dirección Física</label>
					<input type="text" class="form-control" name="direccion" id="direccion" value="{{ Request::old('direccion') ?: Auth::user()->direccion }}">

					@if($errors->has('direccion'))
					<span class="help-block">{{ $errors->first('direccion') }}</span>
					@endif

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('telefono') ? ' has-error' : '' }}">
					<label for="telefono" class="control-label">Teléfono Celular</label>
					<input type="text" class="form-control" name="telefono" id="telefono" value="{{ Request::old('telefono') ?: Auth::user()->telefono }}">

					@if($errors->has('telefono'))
					<span class="help-block">{{ $errors->first('telefono') }}</span>
					@endif

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('tel_contacto') ? ' has-error' : '' }}">
					<label for="tel_contacto" class="control-label">Teléfono de Contacto Extra</label>
					<input type="text" class="form-control" name="tel_contacto" id="tel_contacto" value="{{ Request::old('tel_contacto') ?: Auth::user()->tel_contacto }}">

					@if($errors->has('tel_contacto'))
					<span class="help-block">{{ $errors->first('tel_contacto') }}</span>
					@endif

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('niv_acad') ? ' has-error' : '' }}">
				<label for="niv_acad" class="control-label">Nivel Académico</label>
					<select class="form-control" name="niv_acad" value="{{ Request::old('niv_acad') ?: Auth::user()->niv_acad }}">
                      <option value="Tecnico">Técnico</option>
                      <option value="Licenciatura">Licenciatura</option>
                      <option value="Maestria">Maestría</option>
                      <option value="Doctorado">Doctorado</option>
                      <option value="Especialidad">Especialidad</option>
                    </select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('carrera') ? ' has-error' : '' }}">
					<label for="carrera" class="control-label">Nombre de la Carrera</label>
					<input type="text" class="form-control" name="carrera" id="carrera" value="{{ Request::old('carrera') ?: Auth::user()->carrera }}">

					@if($errors->has('carrera'))
					<span class="help-block">{{ $errors->first('carrera') }}</span>
					@endif

				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('ocupacion') ? ' has-error' : '' }}">
				<label for="ocupacion" class="control-label">Ocupación</label>
					<select class="form-control" name="ocupacion" value="{{ Request::old('ocupacion') ?: Auth::user()->ocupacion }}">
                      <option value="Estudiante">Estudiante</option>
                      <option value="Trabajador">Trabajador</option>
                      <option value="Freelancer">Freelancer</option>
                    </select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('nombre_ocup') ? ' has-error' : '' }}">
					<label for="nombre_ocup" class="control-label">Área de la ocupación</label>
					<input type="text" class="form-control" name="nombre_ocup" id="nombre_ocup" value="{{ Request::old('nombre_ocup') ?: Auth::user()->nombre_ocup }}">

					@if($errors->has('nombre_ocup'))
					<span class="help-block">{{ $errors->first('nombre_ocup') }}</span>
					@endif

				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('exp_lab') ? ' has-error' : '' }}">
					<label for="exp_lab" class="control-label">Experiencia Laboral</label>
					<textarea class="form-control" rows="3" name="exp_lab" value="{{ Request::old('exp_lab') ?: Auth::user()->exp_lab }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('form_acad') ? ' has-error' : '' }}">
					<label for="form_acad" class="control-label">Formación Académica</label>
					<textarea class="form-control" rows="3" name="form_acad" value="{{ Request::old('form_acad') ?: Auth::user()->form_acad }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('cursos') ? ' has-error' : '' }}">
					<label for="cursos" class="control-label">Cursos</label>
					<textarea class="form-control" rows="3" name="cursos" value="{{ Request::old('cursos') ?: Auth::user()->cursos }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('certificaciones') ? ' has-error' : '' }}">
					<label for="certificaciones" class="control-label">Certificaciones</label>
					<textarea class="form-control" rows="3" name="certificaciones" value="{{ Request::old('certificaciones') ?: Auth::user()->certificaciones }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('idiomas') ? ' has-error' : '' }}">
					<label for="idiomas" class="control-label">Idiomas</label>
					<textarea class="form-control" rows="3" name="idiomas" value="{{ Request::old('idiomas') ?: Auth::user()->idiomas }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('aptitudes') ? ' has-error' : '' }}">
					<label for="aptitudes" class="control-label">Aptitudes</label>
					<textarea class="form-control" rows="3" name="aptitudes" value="{{ Request::old('aptitudes') ?: Auth::user()->aptitudes }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6 {{$errors->has('info_adic') ? ' has-error' : '' }}">
					<label for="info_adic" class="control-label">Información Adicional</label>
					<textarea class="form-control" rows="3" name="info_adic" value="{{ Request::old('info_adic') ?: Auth::user()->info_adic }}"></textarea>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-lg-6">
					<button type="submit" class="btn btn-primary">Actualizar Información </button>	
				</div>
			</div>
     <br>
          
          <a href="{{ route('usuario.curriculum') }}" class="btn btn-info glyphicon glyphicon-align-left"> <strong>Ver Curriculum</strong> </a>

          <a href="{{ route('pdf.curriculum') }}" class="btn btn-primary glyphicon glyphicon-download-alt"> <strong>Descargar Curriculum</strong> </a>

        
         
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
</div>


@endsection