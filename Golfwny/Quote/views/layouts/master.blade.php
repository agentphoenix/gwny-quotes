<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@yield('title') &bull; Golf WNY</title>
		<meta name="viewport" content="width=device-width">
		<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico?v2') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('apple-touch-icon.png') }}">

		<!--[if lt IE 9]>
		{{ HTML::script('js/html5shiv.js') }}
		<![endif]-->

		@if (App::environment() == 'production')
			<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
			<link href="//fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">
			<link href="//fonts.googleapis.com/css?family=Exo+2:500,500italic,600,600italic" rel="stylesheet">
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		@else
			<link href="//localhost/global/bootstrap/3.2/css/bootstrap.min.css" rel="stylesheet">
		@endif
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/fonts.css') }}
		@yield('styles')
	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>

		@yield('modals')

		@if (App::environment() == 'production')
			<!--[if lt IE 9]>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->

			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		@else
			<!--[if lt IE 9]>
				<script src="//localhost/global/jquery/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="//localhost/global/jquery/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->

			<script src="//localhost/global/bootstrap/3.2/js/bootstrap.min.js"></script>
		@endif
	</body>
</html>