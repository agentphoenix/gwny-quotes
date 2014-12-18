@extends('layouts.master')

@section('title')
	Package Details
@stop

@section('content')
	<h1>Package Details</h1>

	{{ View::make('pages.package-details-partial')->withQuote($quote) }}
@stop