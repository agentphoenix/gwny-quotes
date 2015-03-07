@extends('layouts.admin')

@section('title')
	Survey Results
@stop

@section('content')
	<h1>Survey Results</h1>

	<div class="visible-xs visible-sm">
		<p><a href="{{ route('admin.quotes.edit', [$quote->id]) }}" class="btn btn-default btn-lg btn-block">Back to Quote</a></p>
	</div>
	<div class="visible-md visible-lg">
		<div class="btn-toolbar">
			<div class="btn-group">
				<a href="{{ route('admin.quotes.edit', [$quote->id]) }}" class="btn btn-default">Back to Quote</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<div class="ui statistic">
				<div class="value" id="displayPrice">{{ $quote->present()->ratingOverall }}</div>
				<div class="label">Overall Rating</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="ui statistic">
				<div class="value" id="displayPrice">{{ $quote->present()->ratingHotel }}</div>
				<div class="label">Hotel Rating</div>
			</div>
		</div>
	</div>

	<div class="ui divider"></div>

	<h2>Full Results</h2>

	@foreach ($results as $result)
		<div class="panel panel-default">
			<div class="list-group">
				<div class="list-group-item">
					<p class="list-group-item-text">How would you rate your stay at the {{ $quote->present()->hotel }}?</p>
					<h4 class="list-group-item-heading">{{ $result->present()->ratingHotel }}</h4>
				</div>

				@if ( ! empty($result->hotel_comments))
					<div class="list-group-item">
						<p class="list-group-item-text">Please provide any comments you may have about your stay at the {{ $quote->present()->hotel }}.</p>
						{{ $result->present()->commentHotel }}
					</div>
				@endif

				@if ( ! empty($result->golf_comments))
					<div class="list-group-item">
						<p class="list-group-item-text">Please provide any comments you may have about the course(s) you played during your Stay-N-Play Package.</p>
						<p class="list-group-item-text text-muted">{{ $quote->present()->golfCoursesNice }}</p>
						{{ $result->present()->commentGolf }}
					</div>
				@endif

				<div class="list-group-item">
					<p class="list-group-item-text">Overall how would you rate your Stay-N-Play Package experience?</p>
					<h4 class="list-group-item-heading">{{ $result->present()->ratingPackage }}</h4>
				</div>

				@if ( ! empty($result->overall_comments))
					<div class="list-group-item">
						<p class="list-group-item-text">Please provide any comments on how we can improve our Stay-N-Play Packages.</p>
						{{ $result->present()->commentPackage }}
					</div>
				@endif

				<div class="list-group-item">
					<p class="list-group-item-text">Would you recommend Golf WNY to friends or family?</p>
					<h4 class="list-group-item-heading">{{ $result->present()->recommend }}</h4>
				</div>

				<div class="list-group-item">
					<p class="list-group-item-text">Can we use your comments on our website?</p>
					<h4 class="list-group-item-heading">{{ $result->present()->useComments }}</h4>
				</div>
			</div>
		</div>
	@endforeach
@stop

@section('styles')
	{{ HTML::style('semantic/components/divider.min.css') }}
	{{ HTML::style('semantic/components/statistic.min.css') }}
@stop