<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" > <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" > <!--<![endif]-->
<head >
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <title >xstumbl</title >
    <meta name="description" content="xstumbl" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <link rel="stylesheet" href="{{asset('assets/minified/application.min.css')}}" >
    <script src="{{asset('assets/minified/modernizr.min.js')}}" ></script >
</head >
<body >
<header class="header">
        <a href="#" class="logo">
            <img src="{{asset('assets/images/logo.png')}}">
        </a>

        <section class="pull-right search-page">
            <a href="{{URL::route('login')}}" class="transparent btn"> Login </a>
            <a href="{{URL::route('register')}}" class="blue btn"> Register </a>
        </section>
    </header>
<div class="main container">
    
    <h2 class="search-info"> Search Results for <strong> {{$name}} </strong> </h2>

    <section class="content clearfix" >
    <div class="newsfeed" >
    @if(!empty($posts))
    @foreach($posts as $post)
    @if($post->type == 'regular')
    <?php $blog = Blog::find($post->blog_id); 
	$user_data = User::find($blog->user_id); 
	?>
    @if($post->regularPost['type'] == 'text')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'image')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'quote')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'link')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'chat')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'video')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @elseif($post->regularPost['type'] == 'audio')
    <div class="feed clearfix" >
        <div class="avatar" >
            <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" >
                <img src="{{asset(json_decode($blog->config)->picture)}}" class="dp" >
            </a >

            <div class="selection" ></div >
        </div >
        <div class="news panel" >
            <div class="post_content" >
                <div class="post_info" >
                    <a href="{{URL::route('publicblog', array('username'=>$user_data->username,'name' => $blog->name))}}" > {{json_decode($blog->config)->title}} </a >
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
                <div class="pull-right" >

                    <a href="#" class="option" >
                        <i class="fas fa-retweet" ></i >
                    </a >
                    <a href="javascript:;" data-href="{{URL::to('like/'.$post->id)}}" class="option like_button" >
                        <i class="fas fa-heart" ></i >
                    </a >
                </div >
            </div >
        </div >
    </div >
    @endif
    @elseif($post->type == 'reblogged')
    {{$post->rebloggedPost}}
    @endif
    @endforeach
    @else
    <h2>No Posts Found</h2>
    @endif
    </div >
    </section >

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script >
<script >window.jQuery || document.write('<script src="{{asset('assets/minified/jquery.min.js')}}"><\/script>')</script >
<script src="{{asset('assets/minified/application.min.js')}}" ></script >

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script >
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {(b[l].q = b[l].q || []).push(arguments)});
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script >
</body>
</html>