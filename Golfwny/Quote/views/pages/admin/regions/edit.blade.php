@extends('layouts.admin')

@section('title')
	Edit Region - {{ $region->present()->name }}
@stop

@section('content')
	<h1>Edit Region <small>{{ $region->present()->name }}</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.regions.index') }}" class="btn btn-default">Back</a>
		</div>
	</div>

	{{ Form::model($region, ['route' => ['admin.regions.update', $region->id], 'method' => 'put']) }}
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
					<label class="control-label">Slug</label>
					{{ Form::text('slug', null, ['class' => 'form-control']) }}
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