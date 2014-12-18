<p>&nbsp;</p>

<div class="ui three cards">
	<div class="card">
		<div class="image">
			{{ HTML::image('img/rochester.jpg') }}
		</div>
		<div class="content">
			<a class="header">Rochester</a>
		</div>
		<div class="extra content">
			<div class="right floated">
				<a href="{{ route('home', ['rochester', 'info']) }}" class="ui icon green button">Get Started <i class="angle double right icon"></i></a>
			</div>
			<a href="http://golfwny.com/rochester/courses" target="_blank" class="ui icon button"><i class="info icon"></i> About</a>
		</div>
	</div>

	<div class="card">
		<div class="image">
			{{ HTML::image('img/buffalo.jpg') }}
		</div>
		<div class="content">
			<a class="header">Buffalo</a>
		</div>
		<div class="extra content">
			<div class="right floated">
				<a href="{{ route('home', ['buffalo', 'info']) }}" class="ui icon green button">Get Started <i class="angle double right icon"></i></a>
			</div>
			<a href="http://golfwny.com/buffalo/courses" target="_blank" class="ui icon button"><i class="info icon"></i> About</a>
		</div>
	</div>

	<div class="card">
		<div class="image">
			{{ HTML::image('img/silverlake.jpg') }}
		</div>
		<div class="content">
			<a class="header">Silver Lake</a>
		</div>
		<div class="extra content">
			<div class="right floated">
				<a href="{{ route('home', ['silver-lake', 'info']) }}" class="ui icon green button">Get Started <i class="angle double right icon"></i></a>
			</div>
			<a href="http://golfwny.com/rochester/course/silver-lake-country-club" target="_blank" class="ui icon button"><i class="info icon"></i> About</a>
		</div>
	</div>
</div>