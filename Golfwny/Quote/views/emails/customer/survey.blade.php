@extends('layouts.email')

@section('content')
	<p>Dear {{ $name }},</p>

	<p>We would like to thank you for booking your Stay N Play Golf Package with Golf Western NY. If you could take a few minutes to fill out our short survey we would greatly appreciate it. Please be honest with your feedback so we can make improvements for future customers.</p>

	<p><a href="{{ route('survey', [$code]) }}">Your Survey</a></p>

	<p>Thank you,</p>

	<p>Eric LaBarr<br>
	Golf Western NY<br>
	585-281-8942</p>
@stop