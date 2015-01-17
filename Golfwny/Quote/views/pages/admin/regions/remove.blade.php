<p>Are you sure you want to delete the region <strong>{{ $region->present()->name }}</strong>? This will remove the region and all courses and hotels for the region. Are you sure you want to continue?</p>

{{ Form::open(['route' => ['admin.regions.destroy', $region->id], 'method' => 'delete']) }}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-lg btn-danger']) }}
			</div>
		</div>
	</div>
{{ Form::close() }}