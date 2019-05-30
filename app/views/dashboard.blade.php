@extends('layout')

@section('title', 'Dashboard')

@section('content')
@include('partials.menu')
<div class="main container" >

<section class="content clearfix" >
<div class="newsfeed" >
<div class="feed clearfix" >
<div class="avatar" >
  <a href="{{URL::route('publicblog', array('username'=>$user->username,'name' => $defaultblog['name']))}}" >
    <img src="{{ asset(Image::path('/'.json_decode($defaultblog['config'])->picture,'resizeCrop',64,64)) }}" class="dp">
  </a >

  <div class="selection" ></div >
</div >
<div class="news" >
<div class="create" >
<ul id="trigger" class="post-triggers" >
  <li >
    <a href="javascript:;" id="text-trigger" >
      <i class="fas fa-font black" ></i >
      <span > Text </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="picture-trigger" >
      <i class="fas fa-image light-red" ></i >
      <span > Picture </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="quote-trigger" >
      <i class="fas fa-quote-right orange" ></i >
      <span > Quote </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="link-trigger" >
      <i class="fas fa-link light-green" ></i >
      <span > Link </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="chat-trigger" >
      <i class="far fa-comment-alt light-blue" ></i >
      <span > Chat </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="audio-trigger" >
      <i class="fas fa-headphones violet" ></i >
      <span > Audio </span >
    </a >
  </li >
  <li >
    <a href="javascript:;" id="video-trigger" >
      <i class="fas fa-video gray" ></i >
      <span > Video </span >
    </a >
  </li >
</ul >
<div class="text post hide" >
  <form method="post" action="{{URL::to('post/text')}}" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input type="text" name="title" placeholder="Title" class="form-control" required>
    <textarea name="content" class="form-control" placeholder="Content" required></textarea >

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input type="text" name="tags" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >
<div class="picture post hide" >
  <form method="post" action="{{URL::to('post/picture')}}" enctype="multipart/form-data" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input name="file[]" multiple="1" type="file" placeholder="Image" class="form-control" accept='image/*' required>
    <!--    <textarea class="form-control" placeholder="Caption" ></textarea >-->

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >
<div class="quote post hide" >
  <form method="post" action="{{URL::to('post/quote')}}" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <textarea name="content" class="form-control" placeholder="Quote" required></textarea >
    <textarea name="source" class="form-control" placeholder="Source" ></textarea >

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >

<div class="link post hide" >
  <form method="post" action="{{URL::to('post/link')}}" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input name="url" type="text" placeholder="URL" class="form-control" required/>
    <input name="title" type="text" placeholder="Title" class="form-control" />
    <textarea name="caption" class="form-control" placeholder="Caption" ></textarea >

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >

<div class="chat post hide" >
  <form method="post" action="{{URL::to('post/chat')}}" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input name="title" placeholder="Title" class="form-control" required/>
    <textarea name="content" class="form-control" placeholder="Tourist: Could you....." required></textarea >

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >

<div class="audio post hide" >
  <form method="post" action="{{URL::to('post/audio')}}" enctype="multipart/form-data" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input name="file" type="file" placeholder="Image" class="form-control" accept='audio/*' >
    <!--    <textarea class="form-control" placeholder="Description" ></textarea >-->

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >

<div class="video post hide" >
  <form method="post" action="{{URL::to('post/video')}}" enctype="multipart/form-data" >
    <select name="blog" class="selectpicker" >
      @foreach($blogs as $blog)
      <option value="{{$blog->name}}" > {{json_decode($blog->config)->title}}</option >
      @endforeach
    </select >
    <input name="file" type="file" placeholder="Image" class="form-control" accept='video/*' >
    <!--    <textarea class="form-control" placeholder="Embed Code or Video URL" ></textarea >-->
    <!--    <textarea class="form-control" placeholder="Description" ></textarea >-->

    <div class="form-group has-feedback" >
      <span class="fas fa-tag form-control-feedback" ></span >
      <input name="tags" type="text" class="form-control" placeholder="#tags can be separated by a hashtag or a comma" >

    </div >
    <input type="submit" class="btn btn-primary" value="Post">

    <div class="pull-right" >
      <a href="javascript:;" class="btn btn-default cancel" > Cancel
      </a >
    </div >
  </form >

</div >
</div >
</div >
</div >
<?php $userLikes = $user->likes; ?>
@foreach($posts as $post)
  @if($post->type == 'regular')
    <?php $blog = Blog::find($post->blog_id); ?>
    @if($post->regularPost['type'] == 'text')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
	<img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div >
          <div class="post_desc" > {{json_decode($post->regularPost->content)->content}}</div >
          {{$post->updatedAt}}
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
                  <div class="post_content">
                    <div class="post_info">
                      <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}"> {{json_decode($post->blog->config)->title}} </a>
                    </div>
                    <div class="post_title">{{json_decode($post->regularPost->content)->title}}</div>
                    <div class="post_desc">{{json_decode($post->regularPost->content)->content}}</div>
                    <div class="tags">
                      @foreach($post->tags as $tag)
                      <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
                      @endforeach
                    </div>
                  </div>
                </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
             <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
		<span class="no_of_likes">{{$post->likers->count()}}</span>
                <i class="fas fa-heart" style="color:#FF6448"></i >
              </a >
            @else
 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'image')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}}</a >
          </div >
          @foreach(json_decode($post->regularPost->content)->files as $file)
            <img src="{{asset($file)}}" >
          @endforeach

<!--          <div class="post_desc" > Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum-->
<!--                                   has been the industry's standard dummy text ever since the 1500s, when an unknown printer-->
<!--                                   took a galley of type and scrambled it to make a type specimen book. It has survived not-->
<!--                                   only five centuries, but also the leap into electronic typesetting, remaining essentially-->
<!--                                   unchanged. It was popularised in the 1960s with the release of Letraset sheets containing-->
<!--                                   Lorem Ipsum passages, and more recently with desktop publishing software like Aldus-->
<!--                                   PageMaker including versions of Lorem Ipsum.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          @foreach(json_decode($post->regularPost->content)->files as $file)
            <img src="{{asset($file)}}" >
          @endforeach

<!--          <div class="post_desc" > Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum-->
<!--                                   has been the industry's standard dummy text ever since the 1500s, when an unknown printer-->
<!--                                   took a galley of type and scrambled it to make a type specimen book. It has survived not-->
<!--                                   only five centuries, but also the leap into electronic typesetting, remaining essentially-->
<!--                                   unchanged. It was popularised in the 1960s with the release of Letraset sheets containing-->
<!--                                   Lorem Ipsum passages, and more recently with desktop publishing software like Aldus-->
<!--                                   PageMaker including versions of Lorem Ipsum.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'quote')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >
          <div class="quote" > "{{json_decode($post->regularPost->content)->content}}"</div >
          <div class="source" > {{json_decode($post->regularPost->content)->source}}</div >
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          <div class="quote" > "{{json_decode($post->regularPost->content)->content}}"</div >
          <div class="source" > {{json_decode($post->regularPost->content)->source}}</div >
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'link')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >
          <div class="link" >
            <a href="{{json_decode($post->regularPost->content)->url}}" rel="nofollow" class="title" > {{json_decode($post->regularPost->content)->title}} </a >
            <a href="{{json_decode($post->regularPost->content)->url}}" rel="nofollow" class="site" > {{json_decode($post->regularPost->content)->url}} </a >
          </div >
          <div class="caption" >{{json_decode($post->regularPost->content)->caption}}</div >
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          <div class="link" >
            <a href="{{json_decode($post->regularPost->content)->url}}" rel="nofollow" class="title" > {{json_decode($post->regularPost->content)->title}} </a >
            <a href="{{json_decode($post->regularPost->content)->url}}" rel="nofollow" class="site" > {{json_decode($post->regularPost->content)->url}} </a >
          </div >
          <div class="caption" >{{json_decode($post->regularPost->content)->caption}}</div >
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'chat')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div >
          <div class="chat">{{nl2br(json_decode($post->regularPost->content)->content)}}</div>
<!--          <div class="chat" ><span >Tourist :</span > Today, weather is not good.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div>
          <div class="chat">{{json_decode($post->regularPost->content)->content}}</div>
<!--          <div class="chat" ><span >Tourist :</span > Today, weather is not good.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'video')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >

          <video width="495" height="360" controls preload="auto" src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

<!--          <div class="post_desc" > Description about the above video.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          <video width="100%" height="100%" controls src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

<!--          <div class="post_desc" > Description about the above video.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->regularPost['type'] == 'audio')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
          </div >
          <audio controls width="495" >
            <source src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="audio/mpeg" >
            Your browser does not support the audio element.
          </audio >

<!--          <div class="post_desc" > Description about the above audio.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->author->username,'name' => $post->blog->name))}}" > {{json_decode($post->blog->config)->title}} </a >
          </div >
          <audio controls width="495" >
            <source src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="audio/mpeg" >
            Your browser does not support the audio element.
          </audio >

<!--          <div class="post_desc" > Description about the above audio.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="fas fa-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @endif
  @elseif($post->type == 'reblogged')
    <?php $blog = Blog::find($post->blog_id); ?>
    @if($post->rebloggedPost->originalPost->regularPost['type'] == 'text')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=> $post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
            <div class="post_title" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}}</div >
            <div class="post_desc" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}</div >
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
                  <div class="post_content">
                    <div class="post_info">
                      <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
                    </div>
                    <div class="post_title">{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}}</div>
                    <div class="post_desc">{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}</div>
                    <div class="tags">
                      @foreach($post->rebloggedPost->originalPost->tags as $tag)
                      <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
                      @endforeach
                    </div>
                  </div>
                </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <!-- reblogged button here -->
            @if($userLikes->contains($post->id))
		
              <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
		<span class="no_of_likes">{{$post->likers->count()}}</span>
                <i class="fas fa-heart" style="color:#FF6448"></i >
              </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'image')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          @foreach(json_decode($post->rebloggedPost->originalPost->regularPost->content)->files as $file)
            <img src="{{asset($file)}}" >
          @endforeach
          </div>
<!--          <div class="post_desc" > Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum-->
<!--                                   has been the industry's standard dummy text ever since the 1500s, when an unknown printer-->
<!--                                   took a galley of type and scrambled it to make a type specimen book. It has survived not-->
<!--                                   only five centuries, but also the leap into electronic typesetting, remaining essentially-->
<!--                                   unchanged. It was popularised in the 1960s with the release of Letraset sheets containing-->
<!--                                   Lorem Ipsum passages, and more recently with desktop publishing software like Aldus-->
<!--                                   PageMaker including versions of Lorem Ipsum.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          @foreach(json_decode($post->rebloggedPost->originalPost->regularPost->content)->files as $file)
            <img src="{{asset($file)}}" >
          @endforeach

<!--          <div class="post_desc" > Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum-->
<!--                                   has been the industry's standard dummy text ever since the 1500s, when an unknown printer-->
<!--                                   took a galley of type and scrambled it to make a type specimen book. It has survived not-->
<!--                                   only five centuries, but also the leap into electronic typesetting, remaining essentially-->
<!--                                   unchanged. It was popularised in the 1960s with the release of Letraset sheets containing-->
<!--                                   Lorem Ipsum passages, and more recently with desktop publishing software like Aldus-->
<!--                                   PageMaker including versions of Lorem Ipsum.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i>
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'quote')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <div class="quote" > "{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}"</div >
          <div class="source" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->source}}</div >
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <div class="quote" > "{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}"</div >
          <div class="source" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->source}}</div >
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'link')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <div class="link" >
            <a href="{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}}" rel="nofollow" class="title" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}} </a >
            <a href="{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}}" rel="nofollow" class="site" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}} </a >
          </div >
          <div class="caption" >{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->caption}}</div >
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <div class="link" >
            <a href="{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}}" rel="nofollow" class="title" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}} </a >
            <a href="{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}}" rel="nofollow" class="site" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->url}} </a >
          </div >
          <div class="caption" >{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->caption}}</div >
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'chat')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <div class="post_title" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}}</div >
          <div class="chat">{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}</div>
<!--          <div class="chat" ><span >Tourist :</span > Today, weather is not good.-->
<!--          </div >-->
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <div class="post_title" > {{json_decode($post->rebloggedPost->originalPost->regularPost->content)->title}}</div >
          <div class="chat">{{json_decode($post->rebloggedPost->originalPost->regularPost->content)->content}}</div>
<!--          <div class="chat" ><span >Tourist :</span > Today, weather is not good.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            <a href="{{URL::route('postedit', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-pencil-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'video')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <video width="97%" height="97%" controls preload="auto" src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}?random=1" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

<!--          <div class="post_desc" > Description about the above video.-->
<!--          </div >-->
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <video width="90%" height="90%" controls src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

<!--          <div class="post_desc" > Description about the above video.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'audio')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <audio controls width="495" >
            <source src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}" type="audio/mpeg" >
            Your browser does not support the audio element.
          </audio >

<!--          <div class="post_desc" > Description about the above audio.-->
<!--          </div >-->
          </div>
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
        <div class="footer clearfix" >
        <div class="modal fade" id="reblog{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content reblog clearfix">
              <form method="post" action="{{URL::to('reblog')}}">
              <select name="blog" class="selectpicker" >
                @foreach($blogs as $blog)
                <option value="{{$blog->id}}" > {{json_decode($blog->config)->title}}</option >
                @endforeach
              </select >
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->rebloggedPost->originalPost->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="fas fa-retweet"></i> <a href="{{URL::route('publicblog', array('username'=>$post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name))}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <audio controls width="495" >
            <source src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}" type="audio/mpeg" >
            Your browser does not support the audio element.
          </audio >

<!--          <div class="post_desc" > Description about the above audio.-->
<!--          </div >-->
          <div class="tags">
            @foreach($post->rebloggedPost->originalPost->tags as $tag)
            <a class="tag" href="{{URL::route('tagged', array('name' => $tag->name))}}" >#{{$tag->name}}</a >
            @endforeach
          </div>
        </div >
            </div>
                <hr>
                <div class="pull-right footer">
                  <button type="submit" class="blue btn">Reblog</button>
                </div>
                </form>
            </div>
          </div>
        </div>
          <div class="pull-right" >
            @if($post->blog->author->id == $user->id || Sentry::getUser()->hasAccess('admin'))
            <a href="{{URL::route('postdelete', array('id' => $post->id))}}" class="option" >
              <i class="fas fa-trash-alt" ></i >
            </a >
            @endif
            <!-- reblog button here -->
            @if($userLikes->contains($post->id))
		 <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
 <span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" style="color:#FF6448"></i >
            </a >
            @else
		 <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" > 
<span class="no_of_likes">{{$post->likers->count()}}</span>
              <i class="fas fa-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
  @endif
  @endif
@endforeach
<?php echo $posts->links(); ?>
</div >
<aside class="sidebar" >
  <div class="btn-group" >
    <a type="button" class="switch dropdown-toggle" data-toggle="dropdown" >
      <span class="name" > {{json_decode($defaultblog['config'])->title}} </span >
      <span class="url">
	    @if($defaultblog['name'] != 'default')
	  		{{URL::route('publicblog', array('username'=>$user->username,'name' => $defaultblog['name']))}}
		@else
			{{URL::route('publicblog', array('username'=>$user->username) ) }}
		@endif
	  </span>
      <i class="fas fa-chevron-down" ></i >
    </a >
    <ul class="dropdown-menu" role="menu" >
      @foreach($blogs as $blog)
      <li class="blogs" >
	  @if($blog->name != 'default')
		<a href="{{URL::to('/'.$user->username.'/'.$blog->name)}}" class="clearfix" >
	  @else
		<a href="{{URL::to('/'.$user->username)}}" class="clearfix" >
	  @endif
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}">
          <span class="name" > {{json_decode($blog->config)->title}} </span >
          <span class="{{URL::route('publicblog', array('name' => $blog->name))}} </span >
          <i class="fas fa-check" ></i >
        </a >
      </li >
      @endforeach
      <li >
        <a href="{{URL::route('createblog')}}" class="single_list_item" >Create New Blog</a >
      </li >
    </ul >
  </div >
  <ul class="nav nav-pills nav-stacked navigation" >
    <li class="active" ><a href="#" ><i class="far fa-list-alt" ></i >&nbsp; Posts</a ></li >
    <li ><a href="{{URL::route('customise', array('name' => $defaultblog['name']))}}" ><i class="far fa-eye" ></i >&nbsp; Customise</a ></li >
  </ul >
</aside >
</section >
</div >
	
@include('partials.bottom')

@stop

@section('page-script')
<script >

  $('.selectpicker').selectpicker();

  $('#text-trigger').on('click', function () {
    $('.text').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#picture-trigger').on('click', function () {
    $('.picture').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#quote-trigger').on('click', function () {
    $('.quote').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#link-trigger').on('click', function () {
    $('.link').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#chat-trigger').on('click', function () {
    $('.chat').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#audio-trigger').on('click', function () {
    $('.audio').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('#video-trigger').on('click', function () {
    $('.video').removeClass('hide');
    $('#trigger').addClass('hide');
  });

  $('.cancel').on('click', function () {
    $('.post').addClass('hide');
    $('#trigger').removeClass('hide');
  });

  $('.like_button').click(function(){
    $(this).attr('id', 'like_button');
    $.ajax($(this).attr('data-href'))
    .done(function( data ) {
       if(data.message == 'Liked')
       {
         $('#like_button').children('i').css('color', '#FF6448');
         $('#like_button').attr('data-href', data.url);
	 $('#like_button').children('span').html(parseInt($('#like_button').children('span').html())+1);
         $('#like_button').removeAttr('id');
       }
       else
       {
         $('#like_button').children('i').removeAttr('style');
         $('#like_button').attr('data-href', data.url);
	$('#like_button').children('span').html(parseInt($('#like_button').children('span').html())-1);
         $('#like_button').removeAttr('id');
       }
       console.log( data );
    });
  });

</script >
@stop
	

