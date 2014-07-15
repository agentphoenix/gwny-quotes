@extends('layouts.master')

@section('title')
	Home
@stop

@section('content')
	<h1>Home</h1>

	<div class="btn-toolbar">
	@foreach ($regions as $region)
		<div class="btn-group">
			<a href="{{ route('new', [$region->slug]) }}" class="btn btn-lg btn-default">{{ $region->present()->name }}</a>
		</div>
	@endforeach
	</div>
@stop