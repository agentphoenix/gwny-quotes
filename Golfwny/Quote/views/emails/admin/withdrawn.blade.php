@extends('layouts.email')

@section('content')
	<h1>Package Request Withdrawn</h1>

	<p>A package request by {{ $fromName }} has been withdrawn at their request. The details of the package request are below.</p>

	<hr>
		
	{{ $quote }}
@stop