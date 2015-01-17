@extends('layouts.admin')

@section('title')
    Edit User - {{ $user->present()->name }}
@stop

@section('content')
    <h1>Edit User <small>{{ $user->present()->name }}</small></h1>

    <div class="btn-toolbar">
        <div class="btn-group">
            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>

    {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>

        <div class="btn-toolbar">
            <div class="btn-group">
                {{ Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    {{ Form::close() }}
@stop