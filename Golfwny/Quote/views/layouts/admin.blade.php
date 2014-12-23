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
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		@else
			<link href="//localhost/global/bootstrap/3.3/css/bootstrap.min.css" rel="stylesheet">
		@endif

		{{ HTML::style('semantic/semantic.min.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/responsive.css') }}

		<!-- High pixel density displays -->
		<link rel="stylesheet" href="{{ asset('css/retina.css') }}" media="only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)">

		<!--[if lt IE 9]>
		{{ HTML::style('css/ie.css') }}
		<![endif]-->

		<title>@yield('title') &bull; Golf Western NY</title>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="overlay"><h1>GolfWNY</h1></div>
			</div>
		</header>

		<div class="tagline visible-xs">
			<div class="logo"></div>
			<h1>Bring Your Game to Us</h1>
			<h3>Experience everything Western NY has to offer</h3>
		</div>

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
						<div class="col-sm-4 col-md-2">
							<div class="ui fluid vertical menu">
								<div class="header item">
									<i class="dollar icon"></i>
									Quotes
								</div>
								<a class="item">
									Submitted
									@if ($_countSubmitted > 0)
										<div class="ui green label">{{ $_countSubmitted }}</div>
									@endif
								</a>
								<a class="item">
									Accepted
									@if ($_countAccepted > 0)
										<div class="ui green label">{{ $_countAccepted }}</div>
									@endif
								</a>
								<a class="item">
									Rejected
									@if ($_countRejected > 0)
										<div class="ui red label">{{ $_countRejected }}</div>
									@endif
								</a>
								<a href="{{ route('admin.quote.index') }}" class="item">All Quotes</a>
								
								<div class="header item">
									<i class="align left icon"></i>
									Content
								</div>
								<a class="item">Regions</a>
								<a class="item">Courses</a>
								<a class="item">Hotels</a>
								<a class="item">Users</a>

								<div class="header item">
									<i class="bar chart icon"></i>
									Reports
								</div>
								<a class="item">Revenue</a>
								<a class="item">Course</a>
								<a class="item">Hotel</a>

								<a class="header item">
									<i class="announcement icon"></i>
									Survey Results
								</a>
							</div>
						</div>

						<div class="col-sm-8 col-md-10">
							<section>
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

			@if (App::environment() == 'production')
				<!--[if lt IE 9]>
					<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
				<![endif]-->
				<!--[if gte IE 9]><!-->
					<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
				<!--<![endif]-->

				<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
			@yield('scripts')
		</div>
	</body>
</html>