@extends('layouts.admin')

@section('title')
	{{ $year }} Hotels Revenue Report
@stop

@section('content')
	<h1>{{ $year }} Hotels Revenue Report</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
		@foreach ($years as $year)
			<a href="#" class="btn btn-default">{{ $year }}</a>
		@endforeach
		</div>
	</div>

	@foreach ($revenue as $r)
		<h2>{{ $r['name'] }} <small>{{ $r['region'] }}</small></h2>
		<div class="row">
			<div class="col-sm-4">
				<div class="ui statistic">
					<div class="value" id="displayPrice">${{ number_format(round($r['revenue'], 2), 2) }}</div>
					<div class="label">Total Revenue</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="ui statistic">
					<div class="value" id="displayPrice">${{ number_format(round($r['tax'], 2), 2) }}</div>
					<div class="label">Total Tax</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="ui statistic">
					<div class="value" id="displayPrice">{{ $r['rooms'] }}</div>
					<div class="label">Total Rooms</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="ui statistic">
					<div class="value" id="displayPrice">{{ $r['people'] }}</div>
					<div class="label">Total Guests</div>
				</div>
			</div>
		</div>
	@endforeach
@stop

@section('styles')
	{{ HTML::style('semantic/components/statistic.min.css') }}
@stop