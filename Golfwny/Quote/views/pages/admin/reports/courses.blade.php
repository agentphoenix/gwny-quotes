@extends('layouts.admin')

@section('title')
	{{ $year }} Courses Revenue Report
@stop

@section('content')
	<h1>{{ $year }} Courses Revenue Report</h1>

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
			<div class="col-sm-3">
				<div class="ui statistic">
					<div class="value" id="displayPrice">{{ $r['rounds'] }}</div>
					<div class="label">Total Rounds</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="ui statistic">
					<div class="value" id="displayPrice">${{ number_format(round($r['revenue'], 2), 2) }}</div>
					<div class="label">Total Revenue</div>
				</div>
			</div>
		</div>
	@endforeach
@stop

@section('styles')
	{{ HTML::style('semantic/components/statistic.min.css') }}
@stop