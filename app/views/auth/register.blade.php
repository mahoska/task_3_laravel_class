@extends('layout')
 
@section('header_content')
Registration
@stop

@section('authName')
 <li>
    <a class="page-scroll" href="{{asset('auth/login')}}">Authorization</a>
</li>
@stop


@section('content')
 
<div class="container">
    @if ($errors->all())
    <div class="alert alert-danger" style="max-width:70%">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    

{{ Form::open(array('url' => 'auth/register', 'role' => 'form', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Login', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Parrword', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Password confirmation', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-5">
            <button type="submit" class="btn btn-primary">Registration</button>
        </div>
    </div>
 
{{ Form::close() }}
 
</div>
 
@stop




