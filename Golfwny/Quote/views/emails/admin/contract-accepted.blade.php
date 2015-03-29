@extends('layouts.email')

@section('content')
	<p>{{ $fromName }} has accepted the contract. Use the name and email address below to contact the submitter and collect the package deposit ASAP.</p>

	<p><strong>Name:</strong> {{ $fromName }}</p>
	<p><strong>Email Address:</strong> {{ $fromEmail }}</p>
@stop