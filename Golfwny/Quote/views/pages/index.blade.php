@extends('layouts.master')

@section('title')
	Home
@stop

@section('content')
	<h1>Create Your Golf Package</h1>

	<div class="ui four steps">
		<div class="{{ $stepLocationStatus }} step">
			<i class="marker icon"></i>
			<div class="content">
				<div class="title">Location</div>
				<div class="description">
					@if ($location)
						{{ $region->present()->name }}
					@else
						Choose your location
					@endif
				</div>
			</div>
		</div>
		<div class="{{ $stepInfoStatus }} step">
			<i class="info icon"></i>
			<div class="content">
				<div class="title">Basic Info</div>
				<div class="description">
					@if ($quote)
						{{ $quote->present()->dates }}
					@else
						Tell us about your package
					@endif
				</div>
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
				<div class="description">Review &amp; submit your quote</div>
			</div>
		</div>
	</div>

	{{ $view }}
@stop

@section('scripts')
	<script>
		$('.js-addCourse-action').on('click', function(e)
		{
			e.preventDefault();

			$('#coursesTable .row:first').clone().find("input").each(function()
			{
				if ($(this).attr('name') != "courses[people][]")
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