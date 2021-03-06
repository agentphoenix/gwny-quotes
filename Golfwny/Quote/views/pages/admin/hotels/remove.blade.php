<p>Are you sure you want to delete the hotel <strong>{{ $hotel->present()->name }}</strong>?</p>

{{ Form::open(['route' => ['admin.hotels.destroy', $hotel->id], 'method' => 'delete']) }}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::button('Remove', ['type' => 'submit', 'class' => 'btn btn-lg btn-danger']) }}
			</div>
		</div>
	</div>
{{ Form::close() }}