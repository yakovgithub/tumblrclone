@extends('layout')

@section('title', 'Edit Post')

@section('content')
 @include('partials.menu')
<div class="main container">
 
  <section class="white content clearfix">
  <h2>Edit Post</h2>
    <form class="form-horizontal" role="form" method="post" action="{{URL::route('postedit', array('id' => $post->id))}}">
     @if($post->type == 'regular')
      @if($post->regularPost->type=='text' || $post->regularPost->type=='chat')
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" value="{{json_decode($post->regularPost->content)->title}}">
        </div>
      </div>

    	<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
              <textarea name="content" class="form-control">{{json_decode($post->regularPost->content)->content}}</textarea> 
            </div>
    	</div>
      @endif
      @if($post->regularPost->type=='quote')
      <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
              <textarea name="content" class="form-control">{{json_decode($post->regularPost->content)->content}}</textarea> 
            </div>
      </div>
      <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Source</label>
            <div class="col-sm-10">
              <textarea name="source" class="form-control">{{json_decode($post->regularPost->content)->source}}</textarea> 
            </div>
      </div>
      @endif
    	<div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
        <div class="col-sm-10">
          <input name="tags" type="text" class="form-control" value="{{$tags}}">
        </div>
      </div>
      @elseif($post->type == 'reblogged')
      <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
              <textarea name="comment" class="form-control">{{json_decode($post->rebloggedPost->content)->comment}}</textarea> 
            </div>
      </div>
      @endif

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <div class="col-sm-2">
          <div class="pull-right">
            <a href="https://www.xstumbl.com" class="btn btn-default">Cancel</a>
          </div>
        </div>
      </div>
    </form>

  </section>

</div>

@stop
