@extends('layouts.master')

@section('title')
	Check Package Status
@stop

@section('content')
	<h1>Check Package Status</h1>

	{{ Form::open(['route' => 'doCheckStatus']) }}
		<div class="row">
			<div class="col-sm-5 col-md-3">
				<div class="form-group">
					<label class="control-label">Package Code</label>
					{{ Form::text('code', false, ['class' => 'form-control input-lg']) }}
				</div>
			</div>
			<div class="col-sm-4 col-md-2">
				<div class="form-group">
					<label class="control-label">&nbsp;</label>
					{{ Form::button('Check', ['type' => 'submit', 'class' => 'btn btn-lg btn-block btn-primary']) }}
				</div>
			</div>
		</div>
	{{ Form::close() }}
@stop