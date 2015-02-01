@extends('layouts.master')

@section('title')
	Survey
@stop

@section('content')
	<h1>Let Us Know What You Thought!</h1>

	<p>Your feedback is incredibly important to us. We'd appreciate if you'd answer these questions about your package and experience in {{ $quote->present()->region }}.</p>
@stop