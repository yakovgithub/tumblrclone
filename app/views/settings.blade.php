@extends('layout')

@section('title', 'Settings')

@section('content')
 @include('partials.menu')
<div class="main container">
 
  <section class="content clearfix">
	@if(Session::get('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
    <div class="settings">
      <h2 class="title"> Account </h2>
      <hr class="thick">
      <div class="row setting">
        <div class="col-sm-4 option">
          Email
        </div>
        <div class="col-sm-7 data">
          {{$user->email}}
        </div>
        <div class="col-sm-1 trigger">
          <a href="javascript:;" data-toggle="modal" data-target="#changeemail">
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
        </div>
      </div>
      <div class="row setting">
        <div class="col-sm-4 option">
          Password
        </div>
        <div class="col-sm-7 data">
          ***********
        </div>
        <div class="col-sm-1 trigger">
          <a href="javascript:;" data-toggle="modal" data-target="#changepassword">
            <i class="glyphicon glyphicon-pencil"></i>
          </a>
        </div>
      </div>
    </div>

    <aside class="sidebar">
      <ul class="nav nav-pills nav-stacked navigation">
        <li class="active"><a href="{{URL::route('settings')}}"> Account Settings </a></li>
        @if(Sentry::getUser()->hasAccess('admin'))
        <li><a href="{{URL::route('adminsettings')}}"> Admin Settings </a></li>
        @endif
        <li><a href="{{URL::route('dashboard')}}">Dashboard </a></li>
      </ul>
      <div class="title">
        Blogs
      </div>
      <ul class="nav nav-pills nav-stacked navigation">
        @foreach($blogs as $blog)
        <li class=""><a href="{{URL::route('blogsettings', array('name' => $blog->name))}}"> <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',32,32)) }}" class="small-img" /> {{json_decode($blog->config)->title}} </a></li>
        @endforeach
        <li class=""><a href="{{URL::route('createblog')}}"> Create New Blog </a></li>
      </ul>
    </aside>
  </section>

</div>

@include('partials.bottom')

<div class="modal fade" id="changeemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change email address</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{URL::to('user/changeemail')}}">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="inputEmail3" value="{{$user->email}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End of change email modal -->

<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change password</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{URL::to('user/changepassword')}}">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Current Password</label>
            <div class="col-sm-8">
              <input name="oldpassword" type="password" class="form-control" id="inputPassword3">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
            <div class="col-sm-8">
              <input name="password" type="password" class="form-control" id="inputPassword3">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End of change password modal -->

@stop
