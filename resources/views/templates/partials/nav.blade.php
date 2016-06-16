<nav class="nav navbar-inverse" role="nav" style="font-size:15px; color:#01A9DB;">
	<div class="container">
		<div class="navbar-header">
			<a href="{{ route('home') }}" class="navbar-brand" style="font-size:25px; color:#01A9DB;">NeewBee</a>
		</div>

		<div class="collapse navbar-collapse">
			<!-- @if(Auth::check()) -->
			<ul class="nav navbar-nav">
				<li><a href="{{ route('home') }}">Timeline</a></li>
				<li><a href="#">Amigos</a></li>
			</ul>

			<form action="#" class="navbar-form navbar-left" role="buscar">
				<div class="form-group">
					<input type="text" class="form-control" name="query" placeholder="Encontrar colegas">
				</div>

				<button class="btn btn-default" type="submit">Buscar</button>
			</form>

			<!--@endif-->

			<ul class="nav navbar-nav navbar-left">
			<!--@if(Auth::check()) -->
				<li><a href="#">Naty</a></li>
				<li><a href="#">Actualizar Perfil</a></li>
				<li><a href="#">Salir</a></li>
			<!--@else-->
				<li><a href="#">Registro</a></li>
				<li><a href="#">Login</a></li>
		    <!--@endif-->
			</ul>
		</div>
	</div>
</nav>