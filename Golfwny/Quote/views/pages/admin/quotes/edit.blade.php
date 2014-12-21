@extends('layouts.admin')

@section('title')
	Manage Quote
@stop

@section('content')
	<h1>Manage Quote</h1>

	<h2>Cost</h2>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Package Percentage</label>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group">
							{{ Form::text('packagePercent', null, ['class' => 'form-control']) }}
							<span class="input-group-addon"><strong>%</strong></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Deposit Percentage</label>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group">
							{{ Form::text('depositPercent', null, ['class' => 'form-control']) }}
							<span class="input-group-addon"><strong>%</strong></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Total Cost</label>
				<p class="lead"><strong>{{ $quote->present()->price }}</strong></p>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Deposit</label>
				<p class="lead"><strong>{{ $quote->present()->deposit }}</strong></p>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label">Cost per Person</label>
				<p class="lead"><strong>{{ $quote->present()->pricePerPerson }}</strong></p>
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
							{{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Email Address</label>
							{{ Form::email('email', null, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">City</label>
							{{ Form::text('city', null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Phone Number</label>
							{{ Form::text('phone', null, ['class' => 'form-control']) }}
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
									{{ Form::text('arrival', null, ['class' => 'form-control']) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Departure Date</label>
							<div class="row">
								<div class="col-md-9">
									{{ Form::text('departure', null, ['class' => 'form-control']) }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Number of People</label>
							<div class="row">
								<div class="col-md-4">
									{{ Form::text('people', null, ['class' => 'form-control']) }}
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
							{{ Form::select('hotel[id]', $hotels, $hotel->hotel_id, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label">Rate</label>
							<div class="input-group">
								<span class="input-group-addon"><strong>$</strong></span>
								{{ Form::text('hotel[rate]', $hotel->rate, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label">People</label>
							{{ Form::text('hotel[people]', $hotel->people, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Arrival</label>
							{{ Form::text('hotel[arrival]', $hotel->arrival, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Departure</label>
							{{ Form::text('hotel[departure]', $hotel->departure, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Confirmation Number</label>
							{{ Form::text('hotel[confirmation]', $hotel->confirmation, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Check-In Time</label>
							{{ Form::text('hotel[time]', $hotel->time, ['class' => 'form-control']) }}
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