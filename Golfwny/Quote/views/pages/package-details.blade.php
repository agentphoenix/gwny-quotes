@extends('layouts.master')

@section('title')
	Package Details
@stop

@section('content')
	<h1>Package Details</h1>

	@if ($quote->status == Status::ACCEPTED)
		{{ alert('green', "You've accepted the package! We'll be sending you the contract soon.", "thumbs up", "Congratulations!") }}
	@endif

	@if ($quote->status == Status::REJECTED)
		{{ alert('red', "You've rejected the package we put together. Please let us know if there's anything we can do to help change your mind.", "warning sign", "We're Sorry!") }}
	@endif

	{{ View::make('pages.package-details-partial')->withQuote($quote) }}

	@if ($quote->status == Status::ESTIMATE)
		{{ Form::open() }}
			{{ Form::hidden('code', $quote->code) }}

			<div class="btn-toolbar">
				<div class="btn-group">
					{{ Form::button('Accept', ['type' => 'submit', 'name' => 'accept', 'class' => 'btn btn-primary btn-lg']) }}
				</div>
				<div class="btn-group">
					{{ Form::button('Reject', ['type' => 'submit', 'name' => 'reject', 'class' => 'btn btn-danger btn-lg']) }}
				</div>
			</div>
		{{ Form::close() }}
	@endif
@stop