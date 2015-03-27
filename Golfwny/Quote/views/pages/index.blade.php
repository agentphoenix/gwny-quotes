@extends('layouts.main')

@section('title')
	Home
@stop

@section('content')
	<h1>Create Your Golf Package</h1>

	{{ $view }}
@stop

@section('styles')
	{{ HTML::style('css/datepicker.css') }}
	{{ HTML::style('css/bootcards-desktop-lite.min.css') }}
@stop

@section('scripts')
	{{ HTML::script('js/picker.js') }}
	{{ HTML::script('js/picker.date.js') }}
	{{ HTML::script('js/moment.min.js') }}
	{{ HTML::script('js/bootcards.min.js') }}
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

		$(document).on('click', '.js-removeCourse-action', function(e)
		{
			e.preventDefault();

			$(this).closest('.row').fadeOut(300, function()
			{
				$(this).remove();
			});
		});

		$('.js-datepicker-arrival').pickadate({
			format: "dddd, mmmm d, yyyy",
			formatSubmit: "mm/dd/yyyy",
			container: 'main'
		});

		$('.js-datepicker-departure').pickadate({
			format: "dddd, mmmm d, yyyy",
			formatSubmit: "mm/dd/yyyy",
			container: 'main',
			onOpen: function()
			{
				// Build the new minimum date
				var minDate = moment($('[name="arrival_submit"]').val(), "MM/DD/YYYY").add(1, 'day');

				// Set the new minimum date
				this.set('min', minDate.toArray());
			}
		});
	</script>
@stop