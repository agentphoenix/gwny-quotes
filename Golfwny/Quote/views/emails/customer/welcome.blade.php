@extends('layouts.email')

@section('content')
	<p>Dear {{ $name }},</p>

	<p>GolfWNY.com would once again like to thank you for booking your Stay N Play Golf. Enclosed you will find all the items you'll need to make this an unforgettable golf trip. We have enclosed a certificate for each of the courses you will be playing. Please arrive at least 30 minutes prior to your tee time and present these certificates at each course when you check in. You <strong>MUST</strong> have the certificates to play.</p>

	<p>Your accommodations are as follows:</p>

	<p><strong>{{ $dates }}</strong></p>

	<p>
		<strong>{{ $hotel['name'] }}</strong><br>
		{{ $hotel['address'] }}<br>
		{{ $hotel['phone'] }}<br>
		General Manager &ndash; {{ $hotel['gm'] }}
	</p>

	@if ( ! empty($hotel['confirmation']))
		<p>Rooms confirmation number: {{ $hotel['confirmation'] }}</p>
	@endif

	<p>If you have any questions or concerns, please do not hesitate to contact me.</p>

	<p>Thank you,</p>

	<p>Eric LaBarr<br>
	Golf Western NY<br>
	585-281-8942</p>

	<hr>

	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	@foreach ($courses as $course)
		<tr>
			<td width="125">
				@if ( ! empty($course['logo']))
					<img src="{{ $message->embed($course['logo']) }}" width="125">
				@endif
			</td>
			<td width="25">&nbsp;</td>
			<td>
				{{ $course['name'] }}<br>
				{{ $course['address'] }}<br>
				{{ $course['phone'] }}

				@if ( ! empty($course['confirmation']))
					<br><em>Confirmation:</em> {{ $course['confirmation'] }}
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<p>This certificate entitles {{ $name }} ({{ $course['rounds'] }}) rounds of golf with cart at {{ $course['name'] }} on {{ $course['date'] }}.

				@if ($course['holes'] == 18)
					The booked tee time is {{ $course['teeTime1'] }}.
				@else
					The first booked tee time is {{ $course['teeTime1'] }} and the second booked tee time is {{ $course['teeTime2'] }}.
				@endif

				Please present this certificate at check-in.</p>
			</td>
		</tr>
		<tr>
			<td colspan="3"><hr></td>
		</tr>
	@endforeach
	</table>
@stop