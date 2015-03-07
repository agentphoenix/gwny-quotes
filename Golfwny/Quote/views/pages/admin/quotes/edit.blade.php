@extends('layouts.admin')

@section('title')
	Manage Quote
@stop

@section('content')
	<h1>Manage Quote</h1>

	<h2>Cost</h2>

	<div class="row">
		<div class="col-sm-4">
			<div class="ui statistic">
				<div class="value" id="displayPrice">{{ $quote->present()->price }}</div>
				<div class="label">Total Cost</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="ui statistic">
				<div class="value" id="displayDeposit">{{ $quote->present()->deposit }}</div>
				<div class="label">Deposit</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="ui statistic">
				<div class="value" id="displayPricePerPerson">{{ $quote->present()->pricePerPerson }}</div>
				<div class="label">Cost per Person</div>
			</div>
		</div>
	</div>

	<div class="ui divider"></div>

	<div class="row">
		<div class="col-xs-6 col-sm-4">
			<div class="form-group">
				<label class="control-label">Deposit Percentage</label>
				<div class="row">
					<div class="col-md-7">
						<div class="input-group">
							{{ Form::text('depositPercent', $quote->present()->percentDeposit, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'percent_deposit']) }}
							<span class="input-group-addon"><strong>%</strong></span>
						</div>
					</div>
				</div>

				<div class="ui toggle checkbox">
					{{ Form::checkbox('paid_deposit', null, $quote->paid_deposit, ['class' => 'js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'paid_deposit']) }}
					<label>Deposit Paid</label>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4">
			<div class="form-group">
				<label class="control-label">Package Percentage</label>
				<div class="row">
					<div class="col-md-7">
						<div class="input-group">
							{{ Form::text('packagePercent', $quote->present()->percentPackage, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'percent_package']) }}
							<span class="input-group-addon"><strong>%</strong></span>
						</div>
					</div>
				</div>

				<div class="ui toggle checkbox">
					{{ Form::checkbox('paid_total', null, $quote->paid_total, ['class' => 'js-toggleField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'paid_total']) }}
					<label>Package Paid</label>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="form-group">
				<label class="control-label">Square Receipt Number</label>
				{{ Form::text('receiptNumber', $quote->present()->receiptNumber, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'square_receipt_number']) }}
			</div>
		</div>
		<div class="col-xs-12">
			<div class="btn-toolbar">
				@if ($quote->status == Status::SUBMITTED)
					<div class="btn-group">
						<a class="btn btn-primary js-changeStatus" data-status="estimate" data-quote="{{ $quote->id }}">Send Estimate</a>
					</div>
				@endif

				@if ($quote->status >= Status::ESTIMATE_ACCEPTED and $quote->status <= Status::WITHDRAWN)
					<div class="btn-group">
						<a class="btn btn-primary js-changeStatus" data-status="estimate" data-quote="{{ $quote->id }}">Re-Send Estimate</a>
					</div>
				@endif

				@if ($quote->status == Status::ESTIMATE_ACCEPTED)
					<div class="btn-group">
						<a class="btn btn-primary js-changeStatus" data-status="contract" data-quote="{{ $quote->id }}">Send Contract</a>
					</div>
				@endif

				@if ($quote->status < Status::COMPLETED)
					<div class="btn-group">
						<a class="btn btn-danger js-changeStatus" data-status="closed" data-quote="{{ $quote->id }}">Close Quote</a>
					</div>
				@endif
			</div>
		</div>
	</div>

	<div class="ui divider"></div>

	<ul class="nav nav-pills">
		<li class="active"><a href="#submitter" data-toggle="pill">Submitter</a></li>
		<li><a href="#package" data-toggle="pill">Package</a></li>
		<li><a href="#hotel" data-toggle="pill">Hotel</a></li>
		<li><a href="#golf" data-toggle="pill">Golf</a></li>
	</ul>

	<div class="tab-content">
		<div id="submitter" class="active tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quotes.update', $quote->id], 'method' => 'put']) }}
				<h2>Submitter Info</h2>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Name</label>
							{{ Form::text('name', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'name']) }}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">Email Address</label>
							{{ Form::email('email', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'email']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">City</label>
							{{ Form::text('city', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'city']) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Phone Number</label>
							{{ Form::text('phone', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'phone']) }}
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="package" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quotes.update', $quote->id], 'method' => 'put']) }}
				<h2>Package Details</h2>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Region</label>
							<p>{{ $quote->present()->region }}</p>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Code</label>
							<p>{{ $quote->present()->code }}</p>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Status</label>
							<p>{{ Status::toString($quote->status) }}</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Arrival Date</label>
							<div class="row">
								<div class="col-md-9">
									{{ Form::text('arrival', $quote->present()->arrival(false), ['class' => 'form-control js-datepicker', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'arrival', 'data-value' => $quote->present()->arrival(false)]) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Departure Date</label>
							<div class="row">
								<div class="col-md-9">
									{{ Form::text('departure', $quote->present()->departure(false), ['class' => 'form-control js-datepicker', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'departure', 'data-value' => $quote->present()->departure(false)]) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">People</label>
							<div class="row">
								<div class="col-md-6 col-lg-4">
									{{ Form::text('people', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'people', 'data-old' => $quote->people]) }}
								</div>
							</div>
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="hotel" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quotes.update', $quote->id], 'method' => 'put']) }}
				<h2>Hotel Details</h2>
				<?php $hotel = $quote->getHotel();?>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Hotel</label>
							{{ Form::select('hotel[id]', $hotels, $hotel->hotel_id, ['class' => 'form-control js-updateField js-updateHotel', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'hotel_id']) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Rate</label>
							<div class="input-group">
								<span class="input-group-addon"><strong>$</strong></span>
								{{ Form::text('hotel[rate]', $hotel->rate, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'rate']) }}
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">People</label>
							{{ Form::text('hotel[people]', $hotel->people, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'people']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Arrival</label>
							{{ Form::text('hotel[arrival]', $hotel->present()->arrival(false), ['class' => 'form-control js-datepicker', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'arrival', 'data-value' => $hotel->present()->arrival(false)]) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Departure</label>
							{{ Form::text('hotel[departure]', $hotel->present()->departure(false), ['class' => 'form-control js-datepicker', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'departure', 'data-value' => $hotel->present()->departure(false)]) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Check-In Time</label>
							{{ Form::text('hotel[time]', $hotel->present()->time(false), ['class' => 'form-control js-updateField js-timepicker', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'time', 'data-value' => $hotel->present()->time(false)]) }}
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label class="control-label">Confirmation</label>
							{{ Form::text('hotel[confirmation]', $hotel->confirmation, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'confirmation']) }}
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="golf" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quotes.update', $quote->id], 'method' => 'put']) }}
				<?php $courses = $quote->getCourses();?>
				<h2>Golf Details</h2>

				<div id="coursesTable">
				@foreach ($courses as $item)
					<div class="course-row">
						<div class="row" id="row-{{ $item->id }}">
							<div class="col-xs-12 col-md-6 col-lg-4">
								<div class="form-group">
									<label class="control-label">Course</label>
									{{ Form::select('golf[course]', $golfCourses, $item->course_id, ['class' => 'form-control js-updateField js-updateCourse', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'course_id']) }}
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2">
								<div class="form-group">
									<label class="control-label">Rate</label>
									<div class="input-group">
										<span class="input-group-addon"><strong>$</strong></span>
										{{ Form::text('golf[rate]', $item->rate, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'rate']) }}
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2">
								<div class="form-group">
									<label class="control-label">Replay Rate</label>
									<div class="input-group">
										<span class="input-group-addon"><strong>$</strong></span>
										{{ Form::text('golf[replay]', $item->replay_rate, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'replay_rate']) }}
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2">
								<div class="form-group">
									<label class="control-label">Players</label>
									{{ Form::text('golf[people]', $item->people, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'people']) }}
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2" id="numHoles">
								<div class="form-group">
									<label class="control-label">Holes</label>
									{{ Form::select('golf[holes]', [18 => '18 holes', 36 => '36 holes'], $item->holes, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'holes']) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-4">
								<div class="form-group">
									<label class="control-label">Confirmation Number</label>
									{{ Form::text('golf[confirmation]', $item->confirmation, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'confirmation']) }}
								</div>
							</div>
							<div class="col-sm-6 col-lg-2">
								<div class="form-group">
									<label class="control-label">Date</label>
									{{ Form::text('golf[arrival]', $item->present()->arrival(false), ['class' => 'form-control js-datepicker', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'arrival', 'data-value' => $item->present()->arrival(false)]) }}
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2">
								<div class="form-group">
									<label class="control-label">Tee Time</label>
									{{ Form::text('golf[time]', $item->present()->time, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'time']) }}
								</div>
							</div>
							<div class="col-sm-6 col-md-3 col-lg-2 hide" id="teeTime2">
								<div class="form-group">
									<label class="control-label">2nd Tee Time</label>
									{{ Form::text('golf[time2]', $item->present()->time2, ['class' => 'form-control js-updateField', 'data-id' => $item->id, 'data-table' => 'quotes_items', 'data-field' => 'time2']) }}
								</div>
							</div>
						</div>
						<div class="ui divider"></div>
					</div>
				@endforeach
				</div>

				<p><a class="btn btn-default js-addCourse">Add Another Course</a></p>
			{{ Form::close() }}
		</div>
	</div>
@stop

@section('styles')
	{{ HTML::style('css/datepicker.css') }}
	{{ HTML::style('semantic/components/statistic.min.css') }}
	{{ HTML::style('semantic/components/checkbox.min.css') }}
	{{ HTML::style('semantic/components/divider.min.css') }}
@stop

@section('scripts')
	{{ HTML::script('js/picker.js') }}
	{{ HTML::script('js/picker.date.js') }}
	{{ HTML::script('js/picker.time.js') }}
	{{ HTML::script('js/moment.min.js') }}
	{{ HTML::style('semantic/components/checkbox.min.js') }}
	{{ partial('js-changeStatus') }}
	<script>
		$('.ui.checkbox').checkbox({
			fireOnInit: false,
			onChecked: function()
			{
				updateField({
					table: $(this).data('table'),
					field: $(this).data('field'),
					id: $(this).data('id'),
					value: 1
				});
			},
			onUnchecked: function(context)
			{
				updateField({
					table: $(this).data('table'),
					field: $(this).data('field'),
					id: $(this).data('id'),
					value: 0
				});
			}
		});

		$('.js-datepicker').pickadate({
			format: "mm/dd/yyyy",
			onSet: function(context)
			{
				var date = moment(this.$node.context.value, "MM/DD/YYYY");

				updateField({
					table: this.$node.context.dataset.table,
					field: this.$node.context.dataset.field,
					id: this.$node.context.dataset.id,
					value: date.format('YYYY-MM-DD')
				});
			}
		});

		$('.js-timepicker').pickatime({
			format: 'h:i A',
			min: [6, 0],
			max: [22, 0],
			container: 'section',
			onSet: function(context)
			{
				var date = moment(this.$node.context.value, "h:mm A");

				updateField({
					table: this.$node.context.dataset.table,
					field: this.$node.context.dataset.field,
					id: this.$node.context.dataset.id,
					value: date.format('h:mm A')
				});
			}
		});

		$('.js-updateField').on('change', function(e)
		{
			updateField({
				table: $(this).data('table'),
				field: $(this).data('field'),
				id: $(this).data('id'),
				value: $(this).val()
			});
		});

		$('.js-updateHotel').on('change', function(e)
		{
			$.ajax({
				type: "GET",
				url: "{{ URL::to('admin/quotes/get/hotel') }}/" + $(this).val(),
				dataType: "json",
				success: function(data)
				{
					$('[name="hotel[rate]"]').val(data.rate).trigger('change');
				}
			});
		});

		$('.js-updateCourse').on('change', function(e)
		{
			var $course = $(this).parents();
			var $rate = $course.next('div').children('.form-group').children('.input-group').find('.form-control');
			var $replay = $course.next('div').next('div').children('.form-group').children('.input-group').find('.form-control');

			$.ajax({
				type: "GET",
				url: "{{ URL::to('admin/quotes/get/course') }}/" + $(this).val(),
				dataType: "json",
				success: function(data)
				{
					$rate.val(data.rate).trigger('change');
					$replay.val(data.replay_rate).trigger('change');
				}
			});
		});

		$('[name="people"]').on('change', function(e)
		{
			var oldValue = $(this).data('old');
			var newValue = $(this).val();

			if ($('[name="hotel[people]"]').val() == oldValue)
				$('[name="hotel[people]"]').val(newValue).trigger('change');

			$('[name="golf[people]"]').each(function()
			{
				$(this).val(newValue).trigger('change');
			});
		});

		$('[name="arrival"]').on('change', function(e)
		{
			$('[name="hotel[arrival]"]').val($(this).val()).trigger('change');
		});

		$('[name="departure"]').on('change', function(e)
		{
			$('[name="hotel[departure]"]').val($(this).val()).trigger('change');
		});

		$('[name="golf[time2]"]').each(function()
		{
			var $holes = $(this).parents().prev('.row')
				.children('#numHoles').children('.form-group')
				.children().next('select').find(':selected').val();

			if ($holes == 36)
				$(this).parents().removeClass('hide');
		});

		$('[name="golf[holes]"]').on('change', function(e)
		{
			var $time = $(this).parents().next('.row').children('#teeTime2');
			var $item = $time.children('.form-group').children().next('.form-control');

			if ($(this).val() == 18)
			{
				$time.addClass('hide');
				$item.val("").trigger('change');
			}
			else
			{
				$time.removeClass('hide');
				$item.val("").trigger('change');
			}
		});

		$('.js-addCourse').on('click', function(e)
		{
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "{{ URL::to('admin/quotes/add-course') }}",
				data: {
					"_token": "{{ csrf_token() }}",
					"quote": "{{ $quote->code }}"
				},
				success: function(data)
				{
					recalculateCost();

					window.location.reload();
				}
			});
		});

		function updateField(object, quote)
		{
			$.ajax({
				type: "PUT",
				url: "{{ URL::to('admin/quotes') }}/" + object.id,
				data: {
					"_token": "{{ csrf_token() }}",
					"table": object.table,
					"field": object.field,
					"id": object.id,
					"value": object.value
				},
				success: function(data)
				{
					recalculateCost();
				}
			});
		}

		function recalculateCost()
		{
			$.ajax({
				type: "GET",
				url: "{{ URL::to('admin/quotes/recalculate') }}/{{ $quote->id }}",
				dataType: "json",
				success: function(data)
				{
					$('#displayPrice').html(data.price);
					$('#displayDeposit').html(data.deposit);
					$('#displayPricePerPerson').html(data.pricePerPerson);
				}
			});
		}
	</script>
@stop