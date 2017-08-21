@extends('layout')

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


@section('header_content')
Try this:
@stop
 
@section('content')
<p>Short Link: <a href="{{$link}}">{{$link}}</a></p>
@stop


