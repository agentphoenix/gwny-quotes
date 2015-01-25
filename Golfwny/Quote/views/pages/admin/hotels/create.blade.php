@extends('layouts.admin')

@section('title')
	Add New Hotel
@stop

@section('content')
	<h1>Add New Hotel</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="{{ route('admin.hotels.index') }}" class="btn btn-default">Back</a>
		</div>
	</div>

	{{ Form::open(['route' => 'admin.hotels.store']) }}
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
					<label class="control-label">Tax Rate</label>
					<div class="input-group">
						{{ Form::text('tax_rate', null, ['class' => 'form-control']) }}
						<span class="input-group-addon"><strong>%</strong></span>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Default Hotel for This Region?</label>
					<div>
						<label class="radio-inline text-sm">{{ Form::radio('default', (int) true) }} Yes</label>
						<label class="radio-inline text-sm">{{ Form::radio('default', (int) false) }} No</label>
					</div>
				</div>
			</div>
		</div>

		<div class="btn-toolbar">
			<div class="btn-group">
				{{ Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
@stop