@extends('layouts.master')

@section('title')
	New Quote Request
@stop

@section('content')
	<h1>New Quote Request <small>{{ $region->present()->name }}</small></h1>

	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label class="control-label">Name</label>
				{{ Form::text('quote[name]', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label class="control-label">Email Address</label>
				{{ Form::email('quote[email]', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2">
			<div class="form-group">
				<label class="control-label">Phone Number</label>
				{{ Form::text('quote[phone]', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2">
			<div class="form-group">
				<label class="control-label">City</label>
				{{ Form::text('quote[city]', null, ['class' => 'form-control']) }}
			</div>
		</div>
	</div>

	<fieldset>
		<legend>Basic Package Information</legend>

		<div class="row">
			<div class="col-lg-2">
				<div class="form-group">
					<label class="control-label">No. of People</label>
					{{ Form::text('quote[people]', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label class="control-label">Arrival Date</label>
					{{ Form::text('quote[arrival]', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label class="control-label">Departure Date</label>
					{{ Form::text('quote[departure]', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Golf Information</legend>

		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label">Course</label>
					{{ Form::select('quote_items[course_id]', $courses, null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-1">
				<div class="form-group">
					<label class="control-label">Players</label>
					{{ Form::text('quote_items[people]', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-1">
				<div class="form-group">
					<label class="control-label">Holes</label>
					{{ Form::select('quote_items[holes]', $holes, 18, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-5">
				<div class="form-group">
					<label class="control-label">Notes</label>
					{{ Form::textarea('quote_items[notes]', null, ['rows' => 2, 'class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-lg-1">
				<div class="form-group">
					<p>&nbsp;</p>
					{{ Form::button('+', ['class' => 'btn btn-default pull-right']) }}
				</div>
			</div>
		</div>
	</fieldset>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label class="control-label">Other Notes</label>
				{{ Form::textarea('quote[notes]', null, ['rows' => 5, 'class' => 'form-control']) }}
			</div>
		</div>
	</div>

	{{ Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
@stop