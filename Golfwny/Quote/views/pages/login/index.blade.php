@extends('layouts.master')

@section('title')
    Log In
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Log In</h1>

            <hr class="partial-split">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['route' => 'login.do']) }}
                <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
                    <label class="control-label">Email Address</label>
                    {{ Form::text('email', null, ['type' => 'email', 'class' => 'form-control input-with-feedback input-lg']) }}
                    {{ $errors->first('email', '<p class="help-block">:message</p>') }}
                </div>

                <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
                    <label class="control-label">Password</label>
                    {{ Form::password('password', ['class' => 'form-control input-with-feedback input-lg']) }}
                    {{ $errors->first('password', '<p class="help-block">:message</p>') }}
                </div>

                <div class="form-group">
                    {{ Form::button('Log In', ['type' => 'submit', 'class' => 'btn btn-lg btn-block btn-primary']) }}
                    <a href="{{ url('password/remind') }}" class="btn btn-block btn-default">Forgot Your Password?</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop