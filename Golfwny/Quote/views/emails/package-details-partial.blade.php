<p><strong>Arrival Date</strong></p>
<p>{{ $quote->present()->arrival }}</p>

<p><strong>Departure Date</strong></p>
<p>{{ $quote->present()->departure }}</p>

<p><strong>Number of People</strong></p>
<p>{{ $quote->present()->people }}</p>

<p><strong>Package ID</strong></p>
<p>{{ $quote->present()->code }}</p>

@if ($quote->status >= Status::ESTIMATE)
	<h2>Hotel Information</h2>
	<?php $item = $quote->getHotel();?>

	<p><strong>Hotel</strong></p>
	<p>{{ $item->present()->hotel }}</p>
	@if ( ! empty($item->confirmation))
		<p><em>Confirmation Number: <strong>{{ $item->present()->confirmation }}</strong></em></p>
	@endif
	@if ( ! empty($item->time))
		<p><em>Check-In Time: <strong>{{ $item->present()->time }}</strong></em></p>
	@endif

	<p><strong>Number of People</strong></p>
	<p>{{ $item->present()->people }}</p>

	<p><strong>Arrival Date</strong></p>
	<p>{{ $item->present()->arrival }}</p>

	<p><strong>Departure Date</strong></p>
	<p>{{ $item->present()->departure }}</p>
@endif

<h2>Golf Information</h2>

<table cellpadding="0" cellspacing="0" width="100%" border="0">
	<tr>
		<td width="30%"><p><strong>Course</strong></p></td>
		<td width="25%"><p><strong>Number of Players</strong></p></td>
		<td width="25%"><p><strong>Number of Holes</strong></p></td>
		<td width="20%"><p><strong>Tee Time</strong></p></td>
	</tr>
	@foreach ($quote->getCourses() as $item)
		<tr height="35">
			<td valign="middle">
				<p>{{ $item->present()->course }}</p>
				@if ( ! empty($item->confirmation))
					<p><em>Confirmation Number: <strong>{{ $item->present()->confirmation }}</strong></em></p>
				@endif
				@if ( ! empty($item->time))
					<p><em>Tee Time: <strong>{{ $item->present()->time }}</strong></em></p>
				@endif
			</td>
			<td valign="middle"><p>{{ $item->present()->people }}</p></td>
			<td valign="middle"><p>{{ $item->present()->holes }}</p></td>
			<td valign="middle"><p>{{ $item->present()->timePreference }}</p></td>
		</tr>
	@endforeach
</table>

@if ($quote->status >= Status::ESTIMATE)
	<h2>Total Cost</h2>
	<h5>Includes all taxes, gratuity not included. All prices in US Dollars.</h5>

	<p><strong>Cost per Person</strong></p>
	<p>{{ $quote->present()->pricePerPerson }}</p>

	<p><strong>Package Total</strong></p>
	<p>{{ $quote->present()->price }}</p>

	<p><strong>Deposit Due</strong></p>
	<p>{{ $quote->present()->deposit }}</p>
@endif

<h2>Notes from Golf Western NY</h2>

{{ $quote->present()->notes }}
