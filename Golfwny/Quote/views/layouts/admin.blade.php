<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="GolfWNY">
		<meta name="copyright" content="GolfWNY.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Use Html5Shiv in order to allow IE render HTML5 -->
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<link href="//fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900italic" rel="stylesheet">

		@if (App::environment() == 'production')
			<link href="//fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
			<link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900italic" rel="stylesheet">
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		@else
			<link href="//localhost/global/bootstrap/3.3/css/bootstrap.min.css" rel="stylesheet">
		@endif

		{{ HTML::style('semantic/semantic.min.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/responsive.css') }}
		@yield('styles')

		<!-- High pixel density displays -->
		<link rel="stylesheet" href="{{ asset('css/retina.css') }}" media="only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)">

		<!--[if lt IE 9]>
		{{ HTML::style('css/ie.css') }}
		<![endif]-->

		<title>@yield('title') &bull; Golf Western NY</title>
	</head>
	<body>
		<div class="ui left vertical inverted sidebar menu">
			{{ partial('nav-sub') }}
		</div>
		<div class="pusher">
			<header>
				<div class="container">
					<div class="overlay">
						<a class="sidebar-toggle"><i class="content icon"></i></a>
						<h1>GolfWNY</h1>
					</div>
				</div>
			</header>

			<div class="container">
				<nav class="nav-main">
					<ul>
						<li><a href="{{ route('home') }}">Create a New Quote</a></li>
						<li><a href="{{ route('checkStatus') }}">Check the Status of a Quote</a></li>
						<li><a href="http://golfwny.com">Back to GolfWNY</a></li>
					</ul>
				</nav>

				<div class="visible-xs">
					<ul class="nav nav-list">

					</ul>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-2 visible-md visible-lg">
								<div class="ui fluid vertical menu">
									{{ partial('nav-sub') }}
								</div>
							</div>

							<div class="col-md-10">
								<section>
									@if (Session::has('flash.message'))
										@include('partials.flash')
									@endif

									@yield('content')
								</section>
							</div>
						</div>
					</div>
				</div>

				<footer>
					<div class="pull-right">Check out <a href="/">other GolfWNY cities</a>!</div>
					&copy; {{ date('Y') }} Golf Western NY<br>Follow <a href="http://twitter.com/GolfWesternNY" target="_blank">@GolfWesternNY</a>
				</footer>
			</div>
		</div>

		@yield('modals')

		@if (App::environment() == 'production')
			<!--[if lt IE 9]>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->

			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
			<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
			<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-39274726-1']);
				_gaq.push(['_setDomainName', 'golfwny.com']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		@else
			<!--[if lt IE 9]>
				<script src="//localhost/global/jquery/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="//localhost/global/jquery/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->

			<script src="//localhost/global/bootstrap/3.3/js/bootstrap.min.js"></script>
			<script src="//localhost/global/jquery.validate/1.13/jquery.validate.min.js"></script>
			<script src="//localhost/global/jquery.validate/1.13/additional-methods.min.js"></script>
		@endif
		{{ HTML::script('semantic/semantic.min.js') }}
		<script>
			$('.sidebar-toggle').on('click', function(e)
			{
				e.preventDefault();

				$('.left.sidebar').sidebar('toggle');
			});
		</script>
		@yield('scripts')
	</body>
</html>