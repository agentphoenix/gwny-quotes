<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="GolfWNY">
		<meta name="copyright" content="GolfWNY.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Use Html5Shiv in order to allow IE render HTML5 -->
		<!--[if IE]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<link href="//fonts.googleapis.com/css?family=Gruppo" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900italic" rel="stylesheet">

		{{ HTML::style('semantic/semantic.min.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/responsive.css') }}
		{{ HTML::style('css/retina.css', ['media' => 'only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)']) }}
		@yield('styles')

		<!--[if lt IE 9]>
			{{ HTML::style('css/ie.css') }}
		<![endif]-->

		<title>@yield('title') &bull; Golf Western NY</title>
	</head>
	<body>
		<div class="ui sidebar">
			<a class="item"><i class="home icon"></i> Home</a>
			<a class="item"><i class="block layout icon"></i> Topics</a>
			<a class="item"><i class="smile icon"></i> Friends</a>
			<a class="item"><i class="calendar icon"></i> History</a>
			<a class="item"><i class="mail icon"></i> Messages</a>
			<a class="item"><i class="chat icon"></i> Discussions</a>
			<a class="item"><i class="trophy icon"></i> Achievements</a>
			<a class="item"><i class="shop icon"></i> Store</a>
			<a class="item"><i class="settings icon"></i> Settings</a>
		</div>

		<div class="pusher">
			<div class="full height">
				<div class="ui inverted green header vertical segment">
					<div class="ui page grid">
						<div class="column">
							<div class="two column doubling ui stackable relaxed grid">
								<div class="six wide column">
									<h1 class="ui inverted header">Golf WNY</h1>
								</div>
								<div class="ten wide column">
									<nav>
										<ul>
											<li><a href="{{ route('home') }}">New Quote</a></li>
											<li><a href="{{ route('checkStatus') }}">Check Quote</a></li>
											<li><a href="http://golfwny.com">Golf WNY</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="ui page grid">
					<div class="column">
						<section>
							@if (Session::has('flash.message'))
								@include('partials.flash')
							@endif

							@yield('content')
						</section>
					</div>
				</div>

				<div class="ui inverted black footer vertical segment">
					<div class="ui page grid">
						<div class="column">
							<div class="ui stackable inverted relaxed grid">
								<div class="twelve wide column">
									<h3 class="ui inverted header">Golf WNY</h3>

									<p>Our golf packages are designed to fit your budget and allow you to play the best golf courses in Rochester, NY or Buffalo, NY. We know it's never easy planning a golf trip in an area you aren't familiar with, so we're here to guide you in the right direction. Our Stay &amp; Play golf packages offer excellent accommodations that cater to both large and small groups.</p>

									<a href="#" class="ui green button">Visit Our Site</a>
								</div>
								<div class="four wide column">
									<h4 class="ui inverted green header">Follow Golf WNY</h4>

									<div class="ui inverted link list">
										<a href="http://twitter.com/GolfWesternNY" class="item" target="_blank">@GolfWesternNY</a>
									</div>

									<h4 class="ui inverted green header">Golf WNY Cities</h4>

									<div class="ui inverted link list">
										<a href="#" class="item">Rochester, NY</a>
										<a href="#" class="item">Buffalo, NY</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@yield('modals')

		@if (App::environment() == 'production')
			<!--[if lt IE 9]>
				<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
				<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->

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

			<script src="//localhost/global/jquery.validate/1.13/jquery.validate.min.js"></script>
			<script src="//localhost/global/jquery.validate/1.13/additional-methods.min.js"></script>
		@endif
		{{ HTML::script('semantic/semantic.min.js') }}
		<script>
			$(function()
			{
				//$('.ui.sidebar').sidebar('toggle');
			});
		</script>
		@yield('scripts')
	</body>
</html>