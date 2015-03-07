<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Golf WNY">
		<meta name="copyright" content="GolfWNY.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Use Html5Shiv in order to allow IE render HTML5 -->
		<!--[if IE]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<link href="//fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic" rel="stylesheet">

		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/responsive.css') }}
		{{ HTML::style('css/retina.css', ['media' => 'only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)']) }}
		<!--[if lt IE 9]>{{ HTML::style('css/ie.css') }}<![endif]-->
		@yield('styles')

		<title>@yield('title') &bull; Golf Western NY</title>
	</head>
	<body>
		<div class="wrapper">
			<nav id="nav-main" class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#gwny-menu">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ route('home') }}">Golf WNY</a>
					</div>

					<div class="collapse navbar-collapse" id="gwny-menu">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ route('home') }}">New Quote</a></li>
							<li><a href="{{ route('checkStatus') }}">Check Quote</a></li>
							<li><a href="http://golfwny.com">Golf WNY</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<main>
				<div class="container">
					@if (Session::has('flash.message'))
						@include('partials.flash')
					@endif

					@yield('content')
				</div>
			</main>

			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<h4>Golf WNY</h4>

							<p>Our golf packages are designed to fit your budget and allow you to play the best golf courses in Rochester, NY or Buffalo, NY. We know it's never easy planning a golf trip in an area you aren't familiar with, so we're here to guide you in the right direction. Our Stay &amp; Play golf packages offer excellent accommodations that cater to both large and small groups.</p>

							<p><a href="http://golfwny.com" class="btn btn-primary btn-sm">Visit Our Site</a></p>
						</div>
						<div class="col-md-3">
							<h5>Follow Golf WNY</h5>

							<ul class="list-unstyled">
								<li><a href="http://twitter.com/GolfWesternNY" target="_blank">@GolfWesternNY</a></li>
							</ul>

							<h5>Golf WNY Cities</h5>

							<ul class="list-unstyled">
								<li><a href="http://golfwny.com/rochester">Rochester, NY</a></li>
								<li><a href="http://golfwny.com/buffalo">Buffalo, NY</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
		@yield('modals')

		@if (App::environment() == 'production')
			<!--[if lt IE 9]>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->
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
		@endif
		{{ HTML::script('js/bootstrap.min.js') }}
		@yield('scripts')
	</body>
</html>