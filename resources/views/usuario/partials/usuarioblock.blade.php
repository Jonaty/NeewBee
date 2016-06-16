<div class="media">
	<a href="{{ route('usuario.perfil', ['nombre' => $user->nombre]) }}" class="pull-left">
	
		<img src="{{ $user->avatarUrl() }}" alt="{{ $user->nombre() }}" class="media-object">
	</a>

	<div class="media-body">
		<h4 class="media-heading">
			<a href="{{ route('usuario.perfil', ['nombre' => $user->nombre]) }}">{{ $user->nombre() }}</a>
		</h4>
	</div>
</div>