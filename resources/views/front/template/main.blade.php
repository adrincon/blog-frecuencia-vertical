<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/estilos.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<title>@yield('title', 'Home') | Frecuencia Vertical</title>
</head>
<body>

	<header>
		@include('front.template.partials.header')
	</header>
	<section>
	<div class="container">
		@yield('content')
	</section>
		<footer>
			<hr>
			Todos los derechos reservados &copy {{ date('Y')}}
		</footer>

	</div>

	<script src="{{ asset('plugins/js-Per/jquery.js') }}"></script>
    <script src="{{ asset('plugins/js-Per/bootstrap.min.js') }}"></script>
</body>
</html>
