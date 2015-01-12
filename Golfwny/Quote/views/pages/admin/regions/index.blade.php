@extends('layouts.admin')

@section('title')
	Regions
@stop

@section('content')
	<h1>Regions</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.regions.create') }}" class="btn btn-primary">Add Region</a>
		</div>
	</div>

	<div class="data-table data-table-striped data-table-bordered">
	@foreach ($regions as $region)
		<div class="row">
			<div class="col-md-9">
				<p class="lead">{{ $region->present()->name }}</p>
			</div>
			<div class="col-md-3">
				<div class="btn-toolbar pull-right">
					<div class="btn-group">
						<a href="{{ route('admin.regions.edit', [$region->id]) }}" class="btn btn-default">Edit</a>
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