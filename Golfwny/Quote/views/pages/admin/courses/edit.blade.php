@extends('layouts.admin')

@section('title')
	Edit Course - {{ $course->present()->name }}
@stop

@section('content')
	<h1>Edit Course <small>{{ $course->present()->name }}</small></h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.courses.index') }}" class="btn btn-default">Back</a>
		</div>
	</div>

	{{ Form::model($course, ['route' => ['admin.courses.update', $course->id], 'method' => 'put']) }}
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Name</label>
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Region</label>
					{{ Form::select('region_id', $regions, null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<label class="control-label">Rate</label>
					<div class="input-group">
						<span class="input-group-addon"><strong>$</strong></span>
						{{ Form::text('rate', null, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<label class="control-label">Replay Rate</label>
					<div class="input-group">
						<span class="input-group-addon"><strong>$</strong></span>
						{{ Form::text('replay_rate', null, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
		</div>

		<div class="btn-toolbar">
			<div class="btn-group">
				{{ Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
@stop