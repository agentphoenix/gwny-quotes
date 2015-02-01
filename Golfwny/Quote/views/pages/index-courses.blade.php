<h2>Golf</h2>

<p>If you want to play more than 18 holes in one day, select the 36 holes option. If you want to play 36 holes over multiple days, please enter 2 rows for the course(s) you want to play more than 18 holes at.</p>

{{ Form::open(['route' => ['storeCourses', $location]]) }}
	<div class="data-table data-table-striped data-table-bordered" id="coursesTable">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="form-group">
					<label class="control-label">Course</label>
					{{ Form::select('courses[id][]', $courses, null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-sm-6 col-md-2">
				<div class="form-group">
					<label class="control-label">Number of Players</label>
					<div class="row">
						<div class="col-md-6">
							{{ Form::text('courses[people][]', $quote->people, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-2">
				<div class="form-group">
					<label class="control-label">Number of Holes</label>
					{{ Form::select('courses[holes][]', $holes, null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-sm-6 col-md-2">
				<div class="form-group">
					<label class="control-label">Tee Time Preference</label>
					{{ Form::select('courses[time_preference][]', $times, null, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-sm-6 col-md-2">
				<div class="visible-xs visible-sm">
					<p><a class="btn btn-lg btn-block btn-danger js-removeCourse-action">Remove Course</a></p>
				</div>
				<div class="visible-md visible-lg">
					<label class="control-label">&nbsp;</label>
					<div><a class="btn btn-danger js-removeCourse-action pull-right">Remove Course</a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="btn-toolbar">
		<div class="btn-group">
			<a href="#" class="btn btn-default js-addCourse-action">Add Another Course</a>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label">Additional Comments</label>
				{{ Form::textarea('comments', $quote->comments, ['class' => 'form-control', 'rows' => 4]) }}
			</div>
		</div>
	</div>

	{{ Form::hidden('code', $quote->code) }}

	<div class="btn-toolbar">
		<div class="btn-group">
			{{ Form::button('Review &amp; Confirm', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
		</div>
		<div class="btn-group">
			<a href="{{ route('home') }}" class="btn btn-lg btn-default">Start Over</a>
		</div>
	</div>
{{ Form::close() }}