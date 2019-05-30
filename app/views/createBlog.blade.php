@extends('layout')

@section('title', 'Create Blog')

@section('content')
  @include('partials.menu')
<div class="main container">

  <section class="white content clearfix">
    <h1 class="page-title"> Create New Blog </h1>
    <p class="desc">This additional blog can be managed by multiple authors or set to private.<br>
                    Note: If you want to Like posts or Follow other users with this blog identity, you must log out and create a separate account.</p>

    <form class="form-horizontal" role="form" method="post" action="{{URL::route('createblog')}}">
      <div class="form-group">
        <label for="i-title" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
          <input id="i-title" name="title" type="text" class="form-control input-lg create-blog-title">
        </div>
      </div>
      <div class="form-group has-feedback">
        <label for="i-url" class="col-sm-2 control-label">URL</label>
        <div class="col-sm-10">
          <input id="i-url" type="text" class="form-control input-lg create-blog-url" value="xstumbl.com/{{$user->username}}/">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
          <button type="submit" class="btn btn-default">Create a new blog</button>
        </div>
        <div class="col-sm-2">
          <div class="pull-right">
            <button type="reset" class="btn btn-default"> Cancel </button>
          </div>
        </div>
      </div>
    </form>

  </section>

</div>

@stop