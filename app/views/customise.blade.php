@extends('layout')

@section('title', 'Customise')

@section('content')
@include('partials.menu')
<div class="main container" >
	
	<section class="content clearfix">
		<div class="settings">
			<form method="post" action="{{URL::route('customise', array('name' => $currentblog->name))}}">
				<label> Custom CSS : </label>
				<textarea class="code-lg" name="customcss" >{{json_decode($currentblog->config)->customcss}}</textarea>
				<div class="pull-right">
					<button type="submit" class="blue btn"> Save Changes </a>
				</div>
			</form>
		</div>
		<aside class="sidebar">
			<ul class="nav nav-pills nav-stacked navigation">
				<li><a href="{{URL::route('dashboard')}}"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Posts</a></li>
				<li class="active"><a href="{{URL::route('customise', array('name' => $currentblog->name))}}"><i class="glyphicon glyphicon-eye-open"></i>&nbsp; Customize</a></li>
			</ul>
			<div class="title">
        Blogs
      </div>
      <ul class="nav nav-pills nav-stacked navigation">
        @foreach($blogs as $blog)
        <li class="@if($currentblog->name == $blog->name) {{'active'}} @endif"><a href="{{URL::route('customise', array('name' => $blog->name))}}"> <img src="{{asset(json_decode($blog->config)->picture)}}" class="small-img" /> {{json_decode($blog->config)->title}} </a></li>
        @endforeach
      </ul>
		</aside>
	</section>
</div >

@include('partials.bottom')

@stop

@section('page-script')
<script >

  $('.selectpicker').selectpicker();

</script >
@stop
