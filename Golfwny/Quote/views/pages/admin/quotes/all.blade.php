@extends('layouts.admin')

@section('title')
	{{ $header }}
@stop

@section('content')
	<h1>{{ $header }}</h1>

	@if ($quotes->count() > 0)
		<div class="data-table data-table-striped data-table-bordered">
		@foreach ($quotes as $quote)
			<div class="row">
				<div class="col-md-4">
					<p class="lead">{{ $quote->present()->name }}</p>
					<p class="text-muted">{{ $quote->present()->email }}</p>
				</div>
				<div class="col-md-3">
					<p>{{ $quote->present()->arrival }}</p>
					<p>{{ $quote->present()->departure }}</p>
				</div>
				<div class="col-md-2">
					<p>{{ $quote->present()->people }}</p>
					<p>{{ $quote->present()->statusAsLabel }}</p>
				</div>
				<div class="col-md-3">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a href="{{ route('admin.quotes.edit', [$quote->id]) }}" class="btn btn-default">Manage</a>
						</div>
						<div class="btn-group">
							<a href="#" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	@else
		{{ alert('warning', "No quotes found.") }}
	@endif
@stop