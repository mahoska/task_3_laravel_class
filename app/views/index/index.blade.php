@extends('layout')
 
@section('header_content')
Make short URL
@stop



@section('authName')
@if(isset($userName) && Auth::check())
 <li>
    <a class="page-scroll" href="#">You come as: {{{$userName}}}</a>
</li>
<li>
    <a class="page-scroll" href="{{URL::to('auth/logout')}}">Logout</a>
</li>
@endif
@stop
 
@section('content')


<form method="POST" action="{{URL::to('/make-url')}}"  class="form-inline" >
    <div class="form-group">
    <label  for="url">Put URL:</label>
    <input type="text" class="form-control" id="url" placeholder="Enter url" name="url" value="{{Input::old('url')}}"/>
  </div>

<button type="submir" class="btn btn-default"> Make URL </button>
<br>
@if ($errors->first('url'))
<div class="col-sm-3">&nbsp;</div>
<div class="col-sm-6 alert-danger" style="margin-top: 20px;">{{{$errors->first('url')}}} </div>
@endif
</form>
@stop
