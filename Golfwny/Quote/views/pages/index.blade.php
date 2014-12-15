@extends('layouts.master')

@section('title')
	Home
@stop

@section('content')
	<h1>Create Your Golf Package</h1>

	<div class="ui three steps">
		<div class="{{ $stepInfoStatus }} step">
			<i class="info icon"></i>
			<div class="content">
				<div class="title">Basic Information</div>
				<div class="description">When would you like to come?</div>
			</div>
		</div>
		<div class="{{ $stepCoursesStatus }} step">
			<i class="flag icon"></i>
			<div class="content">
				<div class="title">Courses</div>
				<div class="description">Create your golf experience</div>
			</div>
		</div>
		<div class="{{ $stepConfirmStatus }} step">
			<i class="send icon"></i>
			<div class="content">
				<div class="title">Confirmation</div>
				<div class="description">Review and submit your quote</div>
			</div>
		</div>
	</div>

	@if ($step == 'info')
		{{ Form::open(['route' => ['storeInfo', $location]]) }}
			<div class="row">
				<div class="col-sm-6">
					<h2>About You</h2>

					<div class="row">
						<div class="col-sm-10 col-md-8">
							<div class="form-group">
								<label class="control-label">Name</label>
								{{ Form::text('name', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-8">
							<div class="form-group">
								<label class="control-label">Email Address</label>
								{{ Form::email('email', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-md-8">
							<div class="form-group">
								<label class="control-label">City, State/Province</label>
								{{ Form::text('city', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label class="control-label">Phone Number</label>
								{{ Form::text('phone', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<h2>About Your Package</h2>

					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label class="control-label">Number of People</label>
								{{ Form::text('name', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label class="control-label">Arrival Date</label>
								{{ Form::text('arrival', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label class="control-label">Departure Date</label>
								{{ Form::text('departure', false, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="control-label">Additional Comments</label>
								{{ Form::textarea('comments', false, ['class' => 'form-control', 'rows' => 4]) }}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-toolbar">
				<div class="btn-group">
					{{ Form::button('Choose Your Courses', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
				</div>
			</div>
		{{ Form::close() }}
	@endif

	@if ($step == 'courses')
		<h2>Golf</h2>

		{{ Form::open() }}
			<div class="data-table data-table-striped data-table-bordered" id="coursesTable">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label class="control-label">Course</label>
							{{ Form::select('course_id', $courses, null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<div class="form-group">
							<label class="control-label">Number of Players</label>
							<div class="row">
								<div class="col-md-6">
									{{ Form::text('people', null, ['class' => 'form-control']) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<div class="form-group">
							<label class="control-label">Number of Holes</label>
							{{ Form::select('holes', [18 => '18 holes', 36 => '36 holes'], null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<div class="form-group">
							<label class="control-label">Tee Time Preference</label>
							{{ Form::select('time_preference', ['AM' => 'Morning', 'PM' => 'Afternoon'], null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<div class="visible-xs visible-sm">
							<p><a class="btn btn-lg btn-block btn-danger js-removeCourse-action">Remove Course</a></p>
						</div>
						<div class="visible-md visible-lg">
							<label class="control-label">&nbsp;</label>
							<div><a class="btn btn-danger js-removeCourse-action pull-right">Remove Course</a></div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-toolbar">
				<div class="btn-group">
					<a href="#" class="btn btn-default js-addCourse-action">Add Another Course</a>
				</div>
			</div>

			<div class="btn-toolbar">
				<div class="btn-group">
					{{ Form::button('Review &amp; Confirm', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
				</div>
			</div>
		{{ Form::close() }}
	@endif

	@if ($step == 'confirm')
		<h2>Confirm Your Package Details</h2>
	@endif
@stop

@section('scripts')
	<script>
		$('.js-addCourse-action').on('click', function(e)
		{
			e.preventDefault();

			$('#coursesTable .row:first').clone().find("input").each(function()
			{
				$(this).val('');
			}).end().appendTo('#coursesTable');
		});

		$('.js-removeCourse-action').on('click', function(e)
		{
			e.preventDefault();

			$(this).closest('.row').fadeOut(300, function()
			{
				$(this).remove();
			});
		});
	</script>
@stop