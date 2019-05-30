@extends('layout')

@section('title', 'Dashboard')

@section('content')
@include('partials.menu')
<div class="main container" >

<section class="content clearfix" >
<div class="newsfeed" >


<?php $userLikes = $user->likes; ?>
@if(!empty($posts))
@foreach($posts as $post)
@if($post->type == 'regular')
<?php $blog = Blog::find($post->blog_id); ?>
@if($post->regularPost['type'] == 'text')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div >
          <div class="post_desc" > {{json_decode($post->regularPost->content)->content}}</div >
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
                      <a href="http://{{$post->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
              <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
                <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
              </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'image')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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
              <textarea name="comment"> </textarea>
              <input type="hidden" name="originalpostid" value="{{$post->id}}" />
                <div class="quoted news panel">
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'quote')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'link')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'chat')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div >
          <div class="chat">{{json_decode($post->regularPost->content)->content}}</div>
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
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
          </div >
          <div class="post_title" > {{json_decode($post->regularPost->content)->title}}</div >
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'video')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
          </div >
          <video width="495" height="360" src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

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
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
          </div >
          <video width="495" height="360" src="{{URL::asset(json_decode($post->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
</div >
@elseif($post->regularPost['type'] == 'audio')
<div class="feed clearfix" >
  <div class="avatar" >
    <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
      <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
    </a >

    <div class="selection" ></div >
  </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a >
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
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
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
        	<a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="{{ URL::route('publicblog', array('username' => $post->rebloggedPost->originalPost->blog->author->username,'name' => $post->rebloggedPost->originalPost->blog->name)) }}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a> 
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
                      <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
              <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
                <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
              </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'image')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'quote')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'link')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'chat')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'video')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
           <div class="reblog_desc"> {{json_decode($post->rebloggedPost->content)->comment}}</div>
          <div class="reblog_content">
          <video width="495" height="360" src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
          </div >
          <video width="495" height="360" src="{{URL::asset(json_decode($post->rebloggedPost->originalPost->regularPost->content)->url)}}" type="video/mp4" id="player1"  controls="controls" preload="none" ></video >

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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
    @elseif($post->rebloggedPost->originalPost->regularPost['type'] == 'audio')
    <div class="feed clearfix" >
      <div class="avatar" >
        <a href="http://{{$blog->name}}.{{Config::get('database.domain')}}" >
          <img src="{{ asset(Image::path('/'.json_decode($blog->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >

        <div class="selection" ></div >
      </div >
      <div class="news panel" >
        <div class="post_content" >
          <div class="post_info" >
            <a href="{{URL::route('publicblog', array('username'=>$blog->author->username,'name' => $blog->name))}}" >{{json_decode($blog->config)->title}}</a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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
            <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}" > {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a > <i class="glyphicon glyphicon-retweet"></i> <a href="http://{{$post->rebloggedPost->originalPost->blog->name}}.{{Config::get('database.domain')}}"> {{json_decode($post->rebloggedPost->originalPost->blog->config)->title}} </a>
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

            <a href="javascript:;" class="option" data-toggle="modal" data-target="#reblog{{$post->id}}" >
              <i class="glyphicon glyphicon-retweet" ></i >
            </a >
            @if($userLikes->contains($post->id))
            <a href="javascript:;" data-href="{{URL::to('unlike/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" style="color:#FF6448"></i >
            </a >
            @else
            <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
              <i class="glyphicon glyphicon-heart" ></i >
            </a >
            @endif
          </div >
        </div >
      </div >
    </div >
  @endif
  @endif
@endforeach
<?php echo $posts->appends(array('query' => $_GET['query']))->links(); ?>
@else
<h2>No Posts Found</h2>
@endif


</div >
<aside class="sidebar" >
    <div class="btn-group" >

@foreach($bloggers as $blogger)

<div class="blogger" >
        <a href="{{URL::route('publicblog', array('username'=> $blogger->author->username,'name' => $blogger->name))}}" class="avatar">
          <img src="{{ asset(Image::path('/'.json_decode($blogger->config)->picture,'resizeCrop',64,64)) }}" class="dp">
        </a >
	 <a href="{{URL::route('publicblog', array('username'=> $blogger->author->username,'name' => $blogger->name))}}" class="name">
		 {{$blogger->name}}
	</a>
</div>

@endforeach
    </div >
</aside >
</section >
</div >

@stop

@section('page-script')
<script >
    $('.selectpicker').selectpicker();
    $('.like_button').click(function(){
        $(this).attr('id', 'like_button');
        $.ajax($(this).attr('data-href'))
            .done(function( data ) {
                if(data.message == 'Liked')
                {
                    $('#like_button').children('i').css('color', '#FF6448');
                    $('#like_button').attr('data-href', data.url);
                    $('#like_button').removeAttr('id');
                }
                else
                {
                    $('#like_button').children('i').removeAttr('style');
                    $('#like_button').attr('data-href', data.url);
                    $('#like_button').removeAttr('id');
                }
                console.log( data );
            });
    });

</script >
@stop