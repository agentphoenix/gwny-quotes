{{ Form::open(['route' => ['storeInfo', $location]]) }}
	<div class="row">
		<div class="col-sm-6">
			<h2>About You</h2>

			<div class="row">
				<div class="col-sm-10 col-md-8">
					<div class="form-group">
						<label class="control-label">Name</label>
						{{ Form::text('name', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-md-8">
					<div class="form-group">
						<label class="control-label">Email Address</label>
						{{ Form::email('email', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-md-8">
					<div class="form-group">
						<label class="control-label">City, State/Province</label>
						{{ Form::text('city', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<label class="control-label">Phone Number</label>
						{{ Form::text('phone', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<h2>About Your Package</h2>

			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<label class="control-label">Number of People</label>
						{{ Form::text('people', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<label class="control-label">Arrival Date</label>
						{{ Form::text('arrival', false, ['class' => 'form-control']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<label class="control-label">Departure Date</label>
						{{ Form::text('departure', false, ['class' => 'form-control']) }}
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

	<div class="btn-toolbar">
		<div class="btn-group">
			{{ Form::button('Choose Your Courses', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
		</div>
	</div>
{{ Form::close() }}