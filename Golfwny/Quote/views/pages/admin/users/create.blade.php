@extends('layouts.admin')

@section('title')
    Add New User
@stop

@section('content')
    <h1>Add New User</h1>

    <div class="btn-toolbar">
        <div class="btn-group">
            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>

    {{ Form::open(['route' => 'admin.users.store']) }}
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

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Password</label>
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
            </div>
        </div>

        <div class="btn-toolbar">
            <div class="btn-group">
                {{ Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    {{ Form::close() }}
@stop