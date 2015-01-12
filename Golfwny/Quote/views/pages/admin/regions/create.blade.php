@extends('layouts.admin')

@section('title')
	Add New Region
@stop

@section('content')
	<h1>Add New Region</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.regions.index') }}" class="btn btn-default">Back</a>
		</div>
	</div>

	{{ Form::open(['route' => 'admin.regions.store']) }}
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Name</label>
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		{{ Form::hidden('slug', '') }}

		<div class="btn-toolbar">
			<div class="btn-group">
				{{ Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
@stop