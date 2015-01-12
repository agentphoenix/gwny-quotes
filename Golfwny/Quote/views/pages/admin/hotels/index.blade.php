@extends('layouts.admin')

@section('title')
	Hotels
@stop

@section('content')
	<h1>Hotels</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Add Hotel</a>
		</div>
	</div>

	<div class="data-table data-table-striped data-table-bordered">
	@foreach ($hotels as $hotel)
		<div class="row">
			<div class="col-md-9">
				<p class="lead">{{ $hotel->present()->name }}</p>
				<p class="text-muted">{{ $hotel->present()->region }}</p>
			</div>
			<div class="col-md-3">
				<div class="btn-toolbar pull-right">
					<div class="btn-group">
						<a href="{{ route('admin.hotels.edit', [$hotel->id]) }}" class="btn btn-default">Edit</a>
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