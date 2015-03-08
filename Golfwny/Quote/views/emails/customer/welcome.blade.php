@extends('layouts.email')

@section('content')
	<p>Dear {{ $name }},</p>

	<p>GolfWNY.com would once again like to thank you for booking your Stay N Play Golf. Enclosed you will find all the items you'll need to make this an unforgettable golf trip. We have enclosed a certificate for each of the courses you will be playing. Please arrive at least 30 minutes prior to your tee time and present these certificates at each course when you check in. You <strong>MUST</strong> have the certificates to play.</p>

	<p>Your accommodations are as follows:</p>

	<p><strong>{{ $dates }}</strong></p>

	<p>
		<strong>{{ $hotelName }}</strong><br>
		{{ $hotelAddress }}
		{{ $hotelPhone }}<br>
		General Manager &mdash; {{ $hotelGM }}
	</p>

	<p>Rooms confirmation number: {{ $hotelConfirmation }}</p>

	<p>If you have any questions or concerns, please do not hesitate to contact me.</p>

	<p>Thank you,</p>

	<p>Eric LaBarr<br>
	Golf Western NY<br>
	585-281-8942</p>
@stop