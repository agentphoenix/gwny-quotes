@extends('layouts.admin')

@section('title')
	{{ $year }} Revenue Report
@stop

@section('content')
	<h1>{{ $year }} Revenue Report</h1>

	<div class="btn-toolbar">
		<div class="btn-group">
		@foreach ($years as $year)
			<a href="{{ route('admin.reports.revenue', [$year]) }}" class="btn btn-default">{{ $year }}</a>
		@endforeach
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="ui statistic">
				<div class="value" id="displayPrice">${{ number_format(round($revenue['total'], 2), 2) }}</div>
				<div class="label">Total Revenue</div>
			</div><br>
		</div>
		<div class="col-xs-12">
			<div class="ui statistic">
				<div class="value" id="displayPrice">${{ number_format(round($revenue['costs'], 2), 2) }}</div>
				<div class="label">Total Operating Costs</div>
			</div><br>
		</div>
		<div class="col-xs-12">
			<div class="ui statistic">
				<div class="value" id="displayPrice">${{ number_format(round($revenue['square'], 2), 2) }}</div>
				<div class="label">Estimated Square Costs</div>
			</div><br>
		</div>
		<div class="col-xs-12">
			<div class="ui statistic">
				<div class="value" id="displayPrice">${{ number_format(round($revenue['profit'], 2), 2) }}</div>
				<div class="label">Estimated Total Profit</div>
			</div>
		</div>
	</div>
@stop

@section('styles')
	{{ HTML::style('semantic/components/statistic.min.css') }}
@stop