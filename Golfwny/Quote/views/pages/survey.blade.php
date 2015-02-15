@extends('layouts.master')

@section('title')
	Survey
@stop

@section('content')
	<h1>Let Us Know What You Thought!</h1>

	<p>Your feedback is incredibly important to us. We'd appreciate if you'd answer a few questions about your package and experience in {{ $quote->present()->region }}.</p>

	{{ Form::open(['route' => 'survey.store']) }}
		<h2>Hotel</h2>

		<label class="control-label">How would you rate your stay at the {{ $quote->present()->hotel }}?</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group{{ ($errors->has('hotel_rating')) ? ' has-error' : '' }}">
					<p class="help-block">1 - Not Good / 5 - Great</p>
					<div>
						<label class="radio-inline">{{ Form::radio('hotel_rating', 1, false) }} 1</label>
						<label class="radio-inline">{{ Form::radio('hotel_rating', 2, false) }} 2</label>
						<label class="radio-inline">{{ Form::radio('hotel_rating', 3, false) }} 3</label>
						<label class="radio-inline">{{ Form::radio('hotel_rating', 4, false) }} 4</label>
						<label class="radio-inline">{{ Form::radio('hotel_rating', 5, false) }} 5</label>
					</div>
					{{ $errors->first('hotel_rating', '<p class="help-block">:message</p>') }}
				</div>
			</div>
		</div>

		<label class="control-label">Please provide any comments you may have about your stay at the {{ $quote->present()->hotel }}.</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::textarea('hotel_comments', null, ['class' => 'form-control', 'rows' => 5]) }}
				</div>
			</div>
		</div>

		<h2>Golf Courses</h2>

		<label class="control-label">Please provide any comments you may have about the course(s) you played during your Stay-N-Play Package.</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<p class="help-block">{{ $quote->present()->golfCoursesNice }}</p>
					{{ Form::textarea('golf_comments', null, ['class' => 'form-control', 'rows' => 5]) }}
				</div>
			</div>
		</div>

		<h2>Overall</h2>

		<label class="control-label">Overall how would you rate your Stay-N-Play Package experience?</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group{{ ($errors->has('overall_rating')) ? ' has-error' : '' }}">
					<p class="help-block">1 - Not Good / 5 - Great</p>
					<div>
						<label class="radio-inline">{{ Form::radio('overall_rating', 1, false) }} 1</label>
						<label class="radio-inline">{{ Form::radio('overall_rating', 2, false) }} 2</label>
						<label class="radio-inline">{{ Form::radio('overall_rating', 3, false) }} 3</label>
						<label class="radio-inline">{{ Form::radio('overall_rating', 4, false) }} 4</label>
						<label class="radio-inline">{{ Form::radio('overall_rating', 5, false) }} 5</label>
					</div>
					{{ $errors->first('overall_rating', '<p class="help-block">:message</p>') }}
				</div>
			</div>
		</div>

		<label class="control-label">Please provide any comments on how we can improve our Stay-N-Play Packages.</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::textarea('overall_comments', null, ['class' => 'form-control', 'rows' => 5]) }}
				</div>
			</div>
		</div>

		<label class="control-label">Would you recommend Golf WNY to friends or family?</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group{{ ($errors->has('recommend')) ? ' has-error' : '' }}">
					<div>
						<label class="radio-inline">{{ Form::radio('recommend', 1, false) }} Yes</label>
						<label class="radio-inline">{{ Form::radio('recommend', 0, false) }} No</label>
					</div>
					{{ $errors->first('recommend', '<p class="help-block">:message</p>') }}
				</div>
			</div>
		</div>

		<label class="control-label">Can we use your comments on our website?</label>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group{{ ($errors->has('use_comments')) ? ' has-error' : '' }}">
					<div>
						<label class="radio-inline">{{ Form::radio('use_comments', 1, false) }} Yes</label>
						<label class="radio-inline">{{ Form::radio('use_comments', 0, false) }} No</label>
					</div>
					{{ $errors->first('use_comments', '<p class="help-block">:message</p>') }}
				</div>
			</div>
		</div>

		{{ Form::hidden('quote_id', $quote->id) }}

		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					{{ Form::button("Submit", ['type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block']) }}
				</div>
			</div>
		</div>
	{{ Form::close() }}
@stop