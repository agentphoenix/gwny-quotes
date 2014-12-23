@extends('layouts.admin')

@section('title')
	Manage Quote
@stop

@section('content')
	<h1>Manage Quote</h1>

	<h2>Cost</h2>

	<div class="row">
		<div class="col-xs-6 col-md-3">
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
			</div>
		</div>
		<div class="col-xs-6 col-md-4">
			<div class="form-group">
				<label class="control-label transparent">Deposit</label>
				<div class="ui toggle checkbox">
					{{ Form::checkbox('paid_total', null, $quote->paid_total, ['class' => 'js-toggleField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'paid_total']) }}
					<label>Package Paid</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-md-3">
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
			</div>
		</div>
		<div class="col-xs-6 col-md-4">
			<div class="form-group">
				<label class="control-label transparent">Deposit</label>
				<div class="ui toggle checkbox">
					{{ Form::checkbox('paid_deposit', null, $quote->paid_deposit, ['class' => 'js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'paid_deposit']) }}
					<label>Deposit Paid</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<label class="control-label">Total Cost</label>
				<p class="lead"><strong id="displayPrice">{{ $quote->present()->price }}</strong></p>
			</div>
		</div>

		<div class="col-xs-4">
			<div class="form-group">
				<label class="control-label">Deposit</label>
				<p class="lead"><strong id="displayDeposit">{{ $quote->present()->deposit }}</strong></p>
			</div>
		</div>

		<div class="col-xs-4">
			<div class="form-group">
				<label class="control-label">Cost/Person</label>
				<p class="lead"><strong id="displayPricePerPerson">{{ $quote->present()->pricePerPerson }}</strong></p>
			</div>
		</div>
	</div>

	<hr>

	<ul class="nav nav-pills">
		<li class="active"><a href="#submitter" data-toggle="pill">Submitter</a></li>
		<li><a href="#package" data-toggle="pill">Package</a></li>
		<li><a href="#hotel" data-toggle="pill">Hotel</a></li>
		<li><a href="#golf" data-toggle="pill">Golf</a></li>
	</ul>

	<div class="tab-content">
		<div id="submitter" class="active tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quote.update', $quote->id], 'method' => 'put']) }}
				<h2>Submitter Info</h2>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Name</label>
							{{ Form::text('name', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'name']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Email Address</label>
							{{ Form::email('email', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'email']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">City</label>
							{{ Form::text('city', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'city']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Phone Number</label>
							{{ Form::text('phone', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'phone']) }}
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="package" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quote.update', $quote->id], 'method' => 'put']) }}
				<h2>Package Details</h2>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Region</label>
							<p>{{ $quote->present()->region }}</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Code</label>
							<p>{{ $quote->present()->code }}</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Status</label>
							<p>{{ Status::toString($quote->status) }}</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Arrival Date</label>
							<div class="row">
								<div class="col-md-9">
									{{ Form::text('arrival', $quote->present()->arrival(false), ['class' => 'form-control js-datepicker', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'arrival', 'data-value' => $quote->present()->arrival(false)]) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Departure Date</label>
							<div class="row">
								<div class="col-md-9">
									{{ Form::text('departure', $quote->present()->departure(false), ['class' => 'form-control js-datepicker', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'departure', 'data-value' => $quote->present()->departure(false)]) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Number of People</label>
							<div class="row">
								<div class="col-md-4">
									{{ Form::text('people', null, ['class' => 'form-control js-updateField', 'data-id' => $quote->id, 'data-table' => 'quotes', 'data-field' => 'people']) }}
								</div>
							</div>
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="hotel" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quote.update', $quote->id], 'method' => 'put']) }}
				<h2>Hotel Details</h2>
				<?php $hotel = $quote->getHotel();?>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Hotel</label>
							{{ Form::select('hotel[id]', $hotels, $hotel->hotel_id, ['class' => 'form-control js-updateField js-updateHotel', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'hotel_id']) }}
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label">Rate</label>
							<div class="input-group">
								<span class="input-group-addon"><strong>$</strong></span>
								{{ Form::text('hotel[rate]', $hotel->rate, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'rate']) }}
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label">People</label>
							{{ Form::text('hotel[people]', $hotel->people, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'people']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Arrival</label>
							{{ Form::text('hotel[arrival]', $hotel->arrival, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'arrival']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Departure</label>
							{{ Form::text('hotel[departure]', $hotel->departure, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'departure']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Confirmation Number</label>
							{{ Form::text('hotel[confirmation]', $hotel->confirmation, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'confirmation']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Check-In Time</label>
							{{ Form::text('hotel[time]', $hotel->time, ['class' => 'form-control js-updateField', 'data-id' => $hotel->id, 'data-table' => 'quotes_items', 'data-field' => 'time']) }}
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>

		<div id="golf" class="tab-pane">
			{{ Form::model($quote, ['route' => ['admin.quote.update', $quote->id], 'method' => 'put']) }}
				<h2>Golf Details</h2>
			{{ Form::close() }}
		</div>
	</div>
@stop

@section('styles')
	{{ HTML::style('css/datepicker.css') }}
@stop

@section('scripts')
	{{ HTML::script('js/materialize.min.js') }}
	{{ HTML::script('js/moment.min.js') }}
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
				url: "{{ URL::to('admin/quote/get/hotel') }}/" + $(this).val(),
				dataType: "json",
				success: function(data)
				{
					$('[name="hotel[rate]"]').val(data.rate).trigger('change');
				}
			});
		});

		function updateField(object, quote)
		{
			$.ajax({
				type: "PUT",
				url: "{{ URL::to('admin/quote') }}/" + object.id,
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
				url: "{{ URL::to('admin/quote/recalculate') }}/{{ $quote->id }}",
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