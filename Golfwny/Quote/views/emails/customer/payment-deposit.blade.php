@extends('layouts.email')

@section('content')
	<p>Dear {{ $name }},</p>

	<p>We would like to remind you that your deposit for your Stay N Play Golf Package is due. If you have any questions please feel free to contact us anytime.</p>

	<p><a href="{{ route('package', [$code]) }}">Your Package Information</a></p>

	<p>Eric LaBarr<br>
	Golf Western NY<br>
	585-281-8942</p>
@stop