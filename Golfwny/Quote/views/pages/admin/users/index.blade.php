@extends('layouts.admin')

@section('title')
    Users
@stop

@section('content')
    <h1>Users</h1>

    <div class="btn-toolbar">
        <div class="btn-group">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a>
        </div>
    </div>

    <div class="data-table data-table-striped data-table-bordered">
        @foreach ($users as $user)
        <div class="row">
            <div class="col-md-9">
                <p class="lead">{{ $user->present()->name }}</p>
            </div>
            <div class="col-md-3">
                <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-default">Edit</a>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-danger js-user-action" data-action="remove" data-user="{{ $user->id }}">Remove</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop

@section('modals')
    {{ modal(['id' => 'removeUser', 'header' => 'Remove User']) }}
@stop

@section('scripts')
    <script>
        $('.js-user-action').on('click', function(e)
        {
            e.preventDefault();

            if ($(this).data('action') == "remove")
            {
                $.ajax({
                    url: "{{ URL::to('admin/users/') }}/" + $(this).data('user') + "/remove",
                    success: function(data)
                    {
                        $('#removeUser .content .description').html(data);
                        $('#removeUser').modal('show');
                    }
                });
            }
        });
    </script>
@stop