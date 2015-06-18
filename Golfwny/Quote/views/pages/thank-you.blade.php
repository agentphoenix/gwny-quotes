@extends('layouts.main')

@section('title')
	Thank You
@stop

@section('content')
	<h1>Thank You!</h1>

	<p>Thank you for your submission. We'll look over this and get back to you shortly with an estimate for your package.</p>

	{{ alert('info', "Note: if you don't see any emails from us, please check your <em>Junk</em> folder as emails from our system can sometimes be classified as spam by some email providers.") }}
@stop