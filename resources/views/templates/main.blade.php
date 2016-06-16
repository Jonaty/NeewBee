<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | NeewBee</title>
	<link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
</head>
<body style="background:#F2F2F2;">
	
	@include('templates.partials.nav')
	<div class="container">
		<section>
		@include('templates.partials.alerts')
		@yield('content')
	    </section>
	</div>
</body>
</html>