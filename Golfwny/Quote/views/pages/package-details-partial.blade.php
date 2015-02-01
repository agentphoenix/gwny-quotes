<div class="data-table data-table-striped data-table-bordered">
	<div class="row">
		<div class="col-sm-3">
			<p><strong>Arrival Date</strong></p>
		</div>
		<div class="col-sm-3">
			<p><strong>Departure Date</strong></p>
		</div>
		<div class="col-sm-3">
			<p><strong>Number of People</strong></p>
		</div>
		<div class="col-sm-3">
			<p><strong>Package ID</strong></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<p>{{ $quote->present()->arrival }}</p>
		</div>
		<div class="col-sm-3">
			<p>{{ $quote->present()->departure }}</p>
		</div>
		<div class="col-sm-3">
			<p>{{ $quote->present()->people }}</p>
		</div>
		<div class="col-sm-3">
			<p>{{ $quote->present()->code }}</p>
		</div>
	</div>
</div>

@if ($quote->status >= Status::ESTIMATE)
	<h2>Hotel Information</h2>
	<?php $item = $quote->getHotel();?>

	<div class="data-table data-table-striped data-table-bordered">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<p><strong>Hotel</strong></p>
			</div>
			<div class="col-sm-6 col-md-2">
				<p><strong>Number of People</strong></p>
			</div>
			<div class="col-sm-6 col-md-3">
				<p><strong>Arrival Date</strong></p>
			</div>
			<div class="col-sm-6 col-md-3">
				<p><strong>Departure Date</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<p>{{ $item->present()->hotel }}</p>
				@if ( ! empty($item->confirmation))
					<p><em>Confirmation Number: <strong>{{ $item->present()->confirmation }}</strong></em></p>
				@endif
				@if ( ! empty($item->time))
					<p><em>Check-In Time: <strong>{{ $item->present()->time }}</strong></em></p>
				@endif
			</div>
			<div class="col-sm-6 col-md-2">
				<p>{{ $item->present()->people }}</p>
			</div>
			<div class="col-sm-6 col-md-3">
				<p>{{ $item->present()->arrival }}</p>
			</div>
			<div class="col-sm-6 col-md-3">
				<p>{{ $item->present()->departure }}</p>
			</div>
		</div>
	</div>
@endif

<h2>Golf Information</h2>

<div class="data-table data-table-striped data-table-bordered">
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<p><strong>Course</strong></p>
		</div>
		<div class="col-sm-6 col-md-3">
			<p><strong>Number of Players</strong></p>
		</div>
		<div class="col-sm-6 col-md-3">
			<p><strong>Number of Holes</strong></p>
		</div>
		<div class="col-sm-6 col-md-2">
			<p><strong>Tee Time Preference</strong></p>
		</div>
	</div>
	@foreach ($quote->getCourses() as $item)
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<p>{{ $item->present()->course }}</p>
				@if ( ! empty($item->confirmation))
					<p><em>Confirmation Number: <strong>{{ $item->present()->confirmation }}</strong></em></p>
				@endif
				@if ( ! empty($item->time))
					<p><em>Tee Time: <strong>{{ $item->present()->time }}</strong></em></p>
				@endif
			</div>
			<div class="col-sm-6 col-md-3">
				<p>{{ $item->present()->people }}</p>
			</div>
			<div class="col-sm-6 col-md-3">
				<p>{{ $item->present()->holes }}</p>
			</div>
			<div class="col-sm-6 col-md-2">
				<p>{{ $item->present()->timePreference }}</p>
			</div>
		</div>
	@endforeach
</div>

@if ($quote->status >= Status::ESTIMATE)
	<h2>Total Cost <small>Includes all taxes, gratuity not included. All prices in US Dollars.</small></h2>

	<div class="data-table data-table-striped data-table-bordered">
		<div class="row">
			<div class="col-sm-4">
				<p><strong>Cost per Person</strong></p>
			</div>
			<div class="col-sm-4">
				<p><strong>Package Total</strong></p>
			</div>
			<div class="col-sm-4">
				<p><strong>Deposit Due</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<p>{{ $quote->present()->pricePerPerson }}</p>
			</div>
			<div class="col-sm-4">
				<p>{{ $quote->present()->price }}</p>
			</div>
			<div class="col-sm-4">
				<p>{{ $quote->present()->deposit }}</p>
			</div>
		</div>
	</div>
@endif