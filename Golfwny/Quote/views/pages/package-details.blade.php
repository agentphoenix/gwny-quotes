@extends('layouts.master')

@section('title')
	Package Details
@stop

@section('content')
	<h1>Package Details</h1>

	@if ($quote->status == Status::SUBMITTED)
		{{ alert('yellow', "We've received your quote request and are reviewing it. We'll be sending you an estimate soon.", "wait", "Under Review") }}
	@endif

	@if ($quote->status == Status::ESTIMATE_ACCEPTED)
		{{ alert('green', "You've accepted the package! We'll be sending you the contract soon.", "thumbs up", "Congratulations!") }}
	@endif

	@if ($quote->status == Status::CONTRACT_ACCEPTED)
		{{ alert('green', "You've accepted the package contract! We'll be sending you the final details of your package soon.", "thumbs up", "Congratulations!") }}
	@endif

	@if ($quote->status == Status::ESTIMATE_REJECTED)
		{{ alert('red', "You've rejected the package we put together. Please let us know if there's anything we can do to help change your mind.", "warning sign", "We're Sorry!") }}
	@endif

	@if ($quote->status == Status::CONTRACT_REJECTED)
		{{ alert('red', "You've rejected the package contract. Please let us know if there's anything we can do to help change your mind.", "warning sign", "We're Sorry!") }}
	@endif

	@if ($quote->status == Status::WITHDRAWN)
		{{ alert('red', "You've withdrawn this package. Please let us know if there's anything we can do to help.", "warning sign", "We're Sorry!") }}
	@endif

	@if ($quote->status == Status::CLOSED)
		{{ alert('red', "This package request has been closed by Golf Western NY. Please contact us if you have any questions.", "warning sign", "We're Sorry!") }}
	@endif

	{{ View::make('pages.package-details-partial')->withQuote($quote) }}

	@if ($quote->status >= Status::BOOKED)
		{{ View::make('pages.package-contract-partial')->withQuote($quote) }}

		<div class="ui divider"></div>
	@endif

	<div class="btn-toolbar">
		@if ($quote->status == Status::ESTIMATE)
			<div class="btn-group">
				<a class="btn btn-lg btn-primary js-changeStatus" data-status="accepted" data-quote="{{ $quote->id }}">Accept</a>
			</div>
			<div class="btn-group">
				<a class="btn btn-lg btn-danger js-changeStatus" data-status="rejected" data-quote="{{ $quote->id }}">Reject</a>
			</div>
		@endif

		@if ($quote->status == Status::BOOKED)
			<div class="btn-group">
				<a class="btn btn-lg btn-primary js-changeStatus" data-status="contract-accepted" data-quote="{{ $quote->id }}">Accept</a>
			</div>
			<div class="btn-group">
				<a class="btn btn-lg btn-danger js-changeStatus" data-status="contract-rejected" data-quote="{{ $quote->id }}">Reject</a>
			</div>
		@endif

		@if ($quote->status != Status::ESTIMATE_REJECTED and $quote->status != Status::CONTRACT_REJECTED and $quote->status < Status::WITHDRAWN)
			<div class="btn-group">
				<a class="btn btn-lg btn-danger js-changeStatus" data-status="withdrawn" data-quote="{{ $quote->id }}">Withdraw</a>
			</div>
		@endif
	</div>
@stop

@section('scripts')
	{{ partial('js-changeStatus') }}
@stop