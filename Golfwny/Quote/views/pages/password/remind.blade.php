@extends('layouts.main')

@section('title')
	Forgot Your Password?
@stop

@section('content')
	<div class="row">
		<div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
			<h1>Forgot Your Password?</h1>

			<p>To reset your password, enter your email address below. You'll be sent an email with a confirmation link where you'll be able to set your new password.</p>

			<hr class="partial-split">

			{{ Form::open(['action' => 'Quote\Controllers\RemindersController@postRemind']) }}
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label class="control-label">Email Address</label>
							{{ Form::email('email', null, ['class' => 'form-control input-lg']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<p>{{ Form::submit("Send Reset Confirmation", array('class' => 'btn btn-lg btn-block btn-primary')) }}</p>
						<p><a href="{{ route('home') }}" class="btn btn-default btn-block">Cancel</a></p>
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop

@section('scripts')
	{{ partial('js-footerFix') }}
@stop