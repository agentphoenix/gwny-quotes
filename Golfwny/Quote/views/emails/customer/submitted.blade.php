@extends('layouts.email')

@section('content')
	<h1>Package Request Submitted</h1>

	<p>You can check the status of your package at any point from the link below.</p>

	<p><a href="{{ route('package', [$code]) }}">Your Quote</a></p>

	<hr>
		
	{{ $quote }}
@stop