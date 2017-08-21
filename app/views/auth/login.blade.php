@extends('layout')
 
@section('header_content')
Authorization
@stop

@section('authName')
 <li>
    <a class="page-scroll" href="{{asset('auth/register')}}">Registration</a>
</li>
@stop

@section('content')

<form method="POST" action="{{URL::to('auth/login')}}">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="email">Email</label>
        <input name="email" class="form-control" id="email" type="email" value="{{Input::old('email')}}" />
         @if ($errors->first('email'))
        <div class="alert alert-danger" >{{$errors->first('email');}}  </div>
        @endif
    </div>
     <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Password</label>
        <input  name="password"  class="form-control" id="email"  type="password"/>
         @if ($errors->first('password'))
        <div class="alert alert-danger" >{{$errors->first('password');}}  </div>  
        @endif
     </div>
<div class="form-group">

    <div class="col-sm-5">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-5">
     or <a href="{{URL::to('auth/register')}}" class="btn btn-primary">Registration</a>
    </div>
</div>
</form>

@stop