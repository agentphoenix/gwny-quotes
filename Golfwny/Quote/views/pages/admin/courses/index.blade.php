@extends('layouts.admin')

@section('title')
	Courses
@stop

@section('content')
	<h1>Courses</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add Course</a>
		</div>
	</div>

	<div class="data-table data-table-striped data-table-bordered">
	@foreach ($courses as $course)
		<div class="row">
			<div class="col-md-9">
				<p class="lead">{{ $course->present()->name }}</p>
				<p class="text-muted">{{ $course->present()->region }}</p>
			</div>
			<div class="col-md-3">
				<div class="btn-toolbar pull-right">
					<div class="btn-group">
						<a href="{{ route('admin.courses.edit', [$course->id]) }}" class="btn btn-default">Edit</a>
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