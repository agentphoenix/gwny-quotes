<p>Are you sure you want to delete the course <strong>{{ $course->present()->name }}</strong>?</p>

{{ Form::open(['route' => ['admin.courses.destroy', $course->id], 'method' => 'delete']) }}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-lg btn-danger']) }}
			</div>
		</div>
	</div>
{{ Form::close() }}