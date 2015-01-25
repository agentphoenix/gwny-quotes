@extends('layouts.master')

@section('title')
	Package Details
@stop

@section('content')
	<h1>Package Details</h1>

	@if ($quote->status == Status::SUBMITTED)
		{{ alert('yellow', "We've received your quote request and are reviewing it. We'll be sending you an estimate soon.", "wait", "Under Review") }}
	@endif

	@if ($quote->status == Status::ACCEPTED)
		{{ alert('green', "You've accepted the package! We'll be sending you the contract soon.", "thumbs up", "Congratulations!") }}
	@endif

	@if ($quote->status == Status::REJECTED)
		{{ alert('red', "You've rejected the package we put together. Please let us know if there's anything we can do to help change your mind.", "warning sign", "We're Sorry!") }}
	@endif

	{{ View::make('pages.package-details-partial')->withQuote($quote) }}

	@if ($quote->status == Status::SUBMITTED)
		<div class="btn-toolbar">
			<div class="btn-group">
				<a class="btn btn-lg btn-danger js-changeStatus" data-status="withdrawn" data-quote="{{ $quote->id }}">Withdraw</a>
			</div>
		</div>
	@endif

	@if ($quote->status == Status::ESTIMATE)
		<div class="btn-toolbar">
			<div class="btn-group">
				<a class="btn btn-lg btn-primary js-changeStatus" data-status="accepted" data-quote="{{ $quote->id }}">Accept</a>
			</div>
			<div class="btn-group">
				<a class="btn btn-lg btn-danger js-changeStatus" data-status="rejected" data-quote="{{ $quote->id }}">Reject</a>
			</div>
		</div>
	@endif
@stop

@section('scripts')
	{{ partial('js-changeStatus') }}
@stop