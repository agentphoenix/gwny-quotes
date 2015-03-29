@extends('layouts.email')

@section('content')
	<p>Dear {{ $name }},</p>

	<p>We would like to thank you for booking your Stay N Play Golf Package with us. You will receive an email shortly with instructions on how to process your deposit. Additionally, seven days before your arrival you will receive a welcome email with all of the information for your Stay N Play Golf Package. If you have any questions please feel free to contact us anytime.</p>

	<p><a href="{{ route('package', [$code]) }}">Your Package Information</a></p>

	<p>Eric LaBarr<br>
	Golf Western NY<br>
	585-281-8942</p>
@stop