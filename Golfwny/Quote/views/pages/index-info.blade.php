{{ Form::open(['route' => ['storeInfo', $location]]) }}
	<div class="ui grid">
		<div class="doubling two column row">
			<div class="column">
				<h2>About You</h2>

				<div class="ui form">
					<div class="field">
						<label>Name</label>
						{{ Form::text('name', false, ['class' => 'sixteen wide mobile twelve wide field']) }}
					</div>

					<div class="field">
						<label>Email Address</label>
						{{ Form::email('email', false, ['class' => 'twelve wide field']) }}
					</div>

					<div class="field">
						<label>City, State/Province</label>
						{{ Form::text('city', false, ['class' => 'twelve wide field']) }}
					</div>

					<div class="field">
						<label>Phone Number</label>
						{{ Form::text('phone', false, ['class' => 'six wide field']) }}
					</div>
				</div>
			</div>

			<div class="column">
				<h2>About Your Package</h2>

				<div class="ui form">
					<div class="field">
						<label>Number of People</label>
						{{ Form::text('people', false, ['class' => 'three wide field']) }}
					</div>

					<div class="field">
						<label>Arrival Date</label>
						{{ Form::text('arrival', false, ['class' => 'six wide field js-datepicker-arrival']) }}
					</div>

					<div class="field">
						<label>Departure Date</label>
						{{ Form::text('departure', false, ['class' => 'six wide field js-datepicker-departure', 'data-start-date' => '']) }}
					</div>

					<div class="field">
						<label>Additional Comments</label>
						{{ Form::textarea('comments', false, ['class' => 'sixteen wide field', 'rows' => 4]) }}
					</div>
				</div>
			</div>
		</div>
	</div>

	{{ Form::hidden('region_id', $region->id) }}
	{{ Form::hidden('code', '') }}

	{{ Form::button('Choose Your Courses <i class="angle double right icon"></i>', ['type' => 'submit', 'class' => 'big ui green icon button']) }}
{{ Form::close() }}