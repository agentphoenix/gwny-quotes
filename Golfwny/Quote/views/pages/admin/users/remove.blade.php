<p>Are you sure you want to delete the user <strong>{{ $user->present()->name }}</strong>?</p>

{{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::button('Remove', ['type' => 'submit', 'class' => 'btn btn-lg btn-danger']) }}
            </div>
        </div>
    </div>
{{ Form::close() }}