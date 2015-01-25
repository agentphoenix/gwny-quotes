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
			</div>
		</div>
		<div class="{{ $stepInfoStatus }} step">
			<i class="info icon"></i>
			<div class="content">
				<div class="title">Basic Info</div>
			</div>
		</div>
		<div class="{{ $stepCoursesStatus }} step">
			<i class="flag icon"></i>
			<div class="content">
				<div class="title">Courses</div>
			</div>
		</div>
		<div class="{{ $stepConfirmStatus }} step">
			<i class="send icon"></i>
			<div class="content">
				<div class="title">Confirmation</div>
			</div>
		</div>
	</div>

	{{ $view }}
@stop

@section('styles')
	{{ HTML::style('css/datepicker.css') }}
@stop

@section('scripts')
	{{ HTML::script('js/picker.js') }}
	{{ HTML::script('js/picker.date.js') }}
	{{ HTML::script('js/moment.min.js') }}
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

		$('.js-datepicker-arrival').pickadate({
			format: "mm/dd/yyyy",
			onSet: function(context)
			{
				var date = moment(this.$node.context.value, "MM/DD/YYYY");
			}
		});

		$('.js-datepicker-departure').pickadate({
			format: "mm/dd/yyyy",
			onSet: function(context)
			{
				var date = moment(this.$node.context.value, "MM/DD/YYYY");
			}
		});
	</script>
@stop