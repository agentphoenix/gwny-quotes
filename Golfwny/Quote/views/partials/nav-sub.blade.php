<div class="visible-xs">
	<ul class="nav navbar-nav">
		<li><a href="{{ route('home') }}" class="item visible-xs visible-sm">New Quote</a></li>
		<li><a href="{{ route('checkStatus') }}" class="item visible-xs visible-sm">Check the Status of a Quote</a></li>
		<li><a href="http://golfwny.com" class="item visible-xs visible-sm">Back to GolfWNY</a></li>

		<li class="divider"></li>

		<li><strong>Quotes</strong></li>
		<li><a href="{{ route('admin.quotes.active') }}" class="item">
			Active
			@if ($_countActive > 0)
				<div class="ui green label">{{ $_countActive }}</div>
			@endif
		</a></li>
		<li><a href="{{ route('admin.quotes.submitted') }}" class="item">
			Awaiting Review
			@if ($_countSubmitted > 0)
				<div class="ui green label">{{ $_countSubmitted }}</div>
			@endif
		</a></li>
		<li><a href="{{ route('admin.quotes.accepted') }}" class="item">
			Accepted
			@if ($_countAccepted > 0)
				<div class="ui green label">{{ $_countAccepted }}</div>
			@endif
		</a></li>
		<li><a href="{{ route('admin.quotes.rejected') }}" class="item">
			Rejected
			@if ($_countRejected > 0)
				<div class="ui red label">{{ $_countRejected }}</div>
			@endif
		</a></li>
		<li><a href="{{ route('admin.quotes.index') }}" class="item">All Quotes</a></li>

		<li class="divider"></li>

		<li><strong>Content</strong></li>
		<li><a href="{{ route('admin.regions.index') }}" class="item">Regions</a></li>
		<li><a href="{{ route('admin.courses.index') }}" class="item">Courses</a></li>
		<li><a href="{{ route('admin.hotels.index') }}" class="item">Hotels</a></li>
		<li><a href="{{ route('admin.users.index') }}" class="item">Users</a></li>

		<li class="divider"></li>

		<li><strong>Reports</strong></li>
		<li><a href="{{ route('admin.reports.revenue') }}" class="item">Revenue</a></li>
		<li><a href="{{ route('admin.reports.courses') }}" class="item">Courses</a></li>
		<li><a href="{{ route('admin.reports.hotels') }}" class="item">Hotels</a></li>

		<li class="divider"></li>

		<li><a href="{{ route('logout') }}" class="header item"><i class="sign out icon"></i>Log Out</a></li>
	</ul>
</div>

<div class="visible-sm visible-md visible-lg">
	<div class="list-group">
		<strong class="list-group-item">Quotes</strong>
		<a href="{{ route('admin.quotes.active') }}" class="list-group-item">
			Active
			@if ($_countActive > 0)
				{{ label('success', $_countActive) }}
			@endif
		</a>
		<a href="{{ route('admin.quotes.submitted') }}" class="list-group-item">
			Awaiting Review
			@if ($_countSubmitted > 0)
				{{ label('success', $_countSubmitted) }}
			@endif
		</a>
		<a href="{{ route('admin.quotes.accepted') }}" class="list-group-item">
			Accepted
			@if ($_countAccepted > 0)
				{{ label('success', $_countAccepted) }}
			@endif
		</a>
		<a href="{{ route('admin.quotes.rejected') }}" class="list-group-item">
			Rejected
			@if ($_countRejected > 0)
				{{ label('danger', $_countRejected) }}
			@endif
		</a>
		<a href="{{ route('admin.quotes.index') }}" class="list-group-item">All Quotes</a>

		<strong class="list-group-item">Content</strong>
		<a href="{{ route('admin.regions.index') }}" class="list-group-item">Regions</a>
		<a href="{{ route('admin.courses.index') }}" class="list-group-item">Courses</a>
		<a href="{{ route('admin.hotels.index') }}" class="list-group-item">Hotels</a>
		<a href="{{ route('admin.users.index') }}" class="list-group-item">Users</a>

		<strong class="list-group-item">Reports</strong>
		<a href="{{ route('admin.reports.revenue') }}" class="list-group-item">Revenue</a>
		<a href="{{ route('admin.reports.courses') }}" class="list-group-item">Courses</a>
		<a href="{{ route('admin.reports.hotels') }}" class="list-group-item">Hotels</a>

		<a href="{{ route('logout') }}" class="list-group-item">Log Out</a>
	</div>
</div>

<!--<div class="header item"><i class="dollar icon"></i>Quotes</div>-->
<!--<div class="header item"><i class="align left icon"></i>Content</div>-->
<!--<div class="header item"><i class="bar chart icon"></i>Reports</div>-->
<!--<a class="header item"><i class="announcement icon"></i>Survey Results</a>-->