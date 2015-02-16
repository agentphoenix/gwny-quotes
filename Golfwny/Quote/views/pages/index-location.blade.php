<div class="ui stackable three column grid">
	<div class="column">
		<div class="ui fluid card">
			<div class="image">
				{{ HTML::image('img/rochester.jpg') }}
			</div>
			<div class="content">
				<a class="header">Rochester</a>
			</div>
			<div class="extra content">
				<a href="http://golfwny.com/rochester/courses" target="_blank" class="ui button">About</a>
				<a href="{{ route('home', ['rochester', 'info']) }}" class="ui green button">Get Started</a>
			</div>
		</div>
	</div>

	<div class="column">
		<div class="ui fluid card">
			<div class="image">
				{{ HTML::image('img/buffalo.jpg') }}
			</div>
			<div class="content">
				<a class="header">Buffalo</a>
			</div>
			<div class="extra content">
				<a href="http://golfwny.com/buffalo/courses" target="_blank" class="ui button">About</a>
				<a href="{{ route('home', ['buffalo', 'info']) }}" class="ui green button">Get Started</a>
			</div>
		</div>
	</div>

	<div class="column">
		<div class="ui fluid card">
			<div class="image">
				{{ HTML::image('img/silverlake.jpg') }}
			</div>
			<div class="content">
				<a class="header">Silver Lake</a>
			</div>
			<div class="extra content">
				<a href="http://golfwny.com/rochester/course/silver-lake-country-club" target="_blank" class="ui button">About</a>
				<a href="http://golfwny.com/rochester/book-package" target="_blank" class="ui green button">Get Started</a>
			</div>
		</div>
	</div>
</div>