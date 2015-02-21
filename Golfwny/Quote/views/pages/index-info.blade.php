{{ Form::open(['route' => ['storeInfo', $location]]) }}
	<div class="row">
		<div class="col-md-6">
			<h2>About You</h2>

			<div class="row">
				<div class="col-md-8">
					<div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
						<label class="control-label">Name</label>
						{{ Form::text('name', false, ['class' => 'form-control']) }}
						{{ $errors->first('name', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
						<label class="control-label">Email Address</label>
						{{ Form::email('email', false, ['class' => 'form-control']) }}
						{{ $errors->first('email', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group{{ ($errors->has('city')) ? ' has-error' : '' }}">
						<label class="control-label">City, State/Province</label>
						{{ Form::text('city', false, ['class' => 'form-control']) }}
						{{ $errors->first('city', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group{{ ($errors->has('phone')) ? ' has-error' : '' }}">
						<label class="control-label">Phone Number</label>
						{{ Form::text('phone', false, ['class' => 'form-control']) }}
						{{ $errors->first('phone', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<h2>About Your Package</h2>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group{{ ($errors->has('people')) ? ' has-error' : '' }}">
						<label class="control-label">No. of People</label>
						{{ Form::text('people', false, ['class' => 'form-control']) }}
						{{ $errors->first('people', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group{{ ($errors->has('arrival')) ? ' has-error' : '' }}">
						<label class="control-label">Arrival Date</label>
						{{ Form::text('arrival', false, ['class' => 'form-control js-datepicker-arrival']) }}
						{{ $errors->first('arrival', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group{{ ($errors->has('departure')) ? ' has-error' : '' }}">
						<label class="control-label">Departure Date</label>
						{{ Form::text('departure', false, ['class' => 'form-control js-datepicker-departure', 'data-start-date' => '']) }}
						{{ $errors->first('departure', '<p class="help-block">:message</p>') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label class="control-label">Additional Comments</label>
						{{ Form::textarea('comments', false, ['class' => 'form-control', 'rows' => 4]) }}
					</div>
				</div>
			</div>
		</div>
	</div>

	{{ Form::hidden('region_id', $region->id) }}
	{{ Form::hidden('code', '') }}

	<div class="visible-xs visible-sm">
		<p>{{ Form::button('Choose Your Courses', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block']) }}</p>
	</div>
	<div class="visible-md visible-lg">
		<div class="btn-toolbar">
			<div class="btn-group">
				{{ Form::button('Choose Your Courses', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg']) }}
			</div>
		</div>
	</div>
{{ Form::close() }}