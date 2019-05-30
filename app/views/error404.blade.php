@extends('layout')

@section('title', '404 Not Found')

@section('content')
<div class="fixed-container" style="background-image: url('{{asset('assets/images/bg.gif')}}');" >
  <div class="form-container" >
    <img class="logo" src="{{asset("assets/images/".Config::get('database.logo'))}}" >

      <div class="rounded-form" >

        <div class="alert alert-danger">Error: 404, There's nothing here</div>
        
      </div >
  </div >
  <div class="left-footer" >
    <a href="{{URL::to('login')}}" class="transparent button" > Login </a >
	<a href="{{URL::to('register')}}" class="blue btn" style="margin-left: 10px;" > Register </a >
  </div >
  <nav class="right-footer" >
    <!--<ul class="menu" >
      <li ><a href="#" > Terms </a ></li >
      <li ><a href="#" > Privacy </a ></li > -->
    </ul >
  </nav >
</div >
@stop
