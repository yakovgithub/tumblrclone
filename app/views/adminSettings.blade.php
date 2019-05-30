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
      <h2 class="title"> Admin Settings </h2>
      <hr class="thick">
      <div class="row setting">
        <div class="col-sm-4 option">
          Header Includes
        </div>
        <div class="col-sm-7 data">
          Click to edit
        </div>
        <div class="col-sm-1 trigger">
          <a href="javascript:;" data-toggle="modal" data-target="#headercode">
            <i class="fas fa-pencil-alt"></i>
          </a>
        </div>
      </div>
      <div class="row setting">
        <div class="col-sm-4 option">
          Footer Includes
        </div>
        <div class="col-sm-7 data">
          Click to edit
        </div>
        <div class="col-sm-1 trigger">
          <a href="javascript:;" data-toggle="modal" data-target="#footercode">
            <i class="fas fa-pencil-alt"></i>
          </a>
        </div>
      </div>
    </div>

    <aside class="sidebar">
      <ul class="nav nav-pills nav-stacked navigation">
        <li><a href="{{URL::route('settings')}}"> Account Settings </a></li>
        <li class="active"><a href="{{URL::route('adminsettings')}}"> Admin Settings </a></li>
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

<div class="modal fade" id="headercode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Header Includes</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{URL::route('adminsettings')}}">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Header Code</label>
            <div class="col-sm-10">
              <textarea name="headercode" rows="10" class="form-control" id="inputPassword3" >{{$headercode->value}}</textarea>
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

<div class="modal fade" id="footercode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Footer Includes</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{URL::route('adminsettings')}}">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Footer Code</label>
            <div class="col-sm-8">
              <textarea name="footercode" rows="10" class="form-control" id="inputPassword3" >{{$footercode->value}}</textarea>
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
