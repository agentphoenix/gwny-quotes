<a href="{{ route('home') }}" class="item visible-xs visible-sm">New Quote</a>
<a href="{{ route('checkStatus') }}" class="item visible-xs visible-sm">Check the Status of a Quote</a>
<a href="http://golfwny.com" class="item visible-xs visible-sm">Back to GolfWNY</a>

<div class="header item"><i class="dollar icon"></i>Quotes</div>
<a href="{{ route('admin.quotes.active') }}" class="item">
	Active
	@if ($_countActive > 0)
		<div class="ui green label">{{ $_countActive }}</div>
	@endif
</a>
<a href="{{ route('admin.quotes.submitted') }}" class="item">
	Awaiting Review
	@if ($_countSubmitted > 0)
		<div class="ui green label">{{ $_countSubmitted }}</div>
	@endif
</a>
<a href="{{ route('admin.quotes.accepted') }}" class="item">
	Accepted
	@if ($_countAccepted > 0)
		<div class="ui green label">{{ $_countAccepted }}</div>
	@endif
</a>
<a href="{{ route('admin.quotes.rejected') }}" class="item">
	Rejected
	@if ($_countRejected > 0)
		<div class="ui red label">{{ $_countRejected }}</div>
	@endif
</a>
<a href="{{ route('admin.quotes.index') }}" class="item">All Quotes</a>

<div class="header item"><i class="align left icon"></i>Content</div>
<a href="{{ route('admin.regions.index') }}" class="item">Regions</a>
<a href="{{ route('admin.courses.index') }}" class="item">Courses</a>
<a href="{{ route('admin.hotels.index') }}" class="item">Hotels</a>
<a href="{{ route('admin.users.index') }}" class="item">Users</a>

<div class="header item"><i class="bar chart icon"></i>Reports</div>
<a href="{{ route('admin.reports.revenue') }}" class="item">Revenue</a>
<a href="{{ route('admin.reports.courses') }}" class="item">Courses</a>
<a href="{{ route('admin.reports.hotels') }}" class="item">Hotels</a>

<a class="header item"><i class="announcement icon"></i>Survey Results</a>

<a href="{{ route('logout') }}" class="header item"><i class="sign out icon"></i>Log Out</a>