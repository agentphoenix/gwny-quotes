@extends('layouts.admin')

@section('title')
	All Quotes
@stop

@section('content')
	<h1>All Quotes</h1>

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
			</div>
			<div class="col-md-3">
				<div class="btn-toolbar pull-right">
					<div class="btn-group">
						<a href="{{ route('admin.quote.edit', [$quote->id]) }}" class="btn btn-default">Manage</a>
					</div>
					<div class="btn-group">
						<a href="#" class="btn btn-danger">Delete</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
@stop