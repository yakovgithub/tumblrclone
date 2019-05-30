<?php

  class BlogController extends BaseController {

    public function messages()
    {
      $user = User::find(Sentry::getUser()->id);
      $userBlogs = $user->blogsWithMessages->all();
      $messages = array();
      foreach($userBlogs as $blog)
      {
        $messages = array_merge($messages, $blog->receivedMessages->all());
      }

	function cmp($a, $b)
          {
            return strcmp($b->created_at, $a->created_at);
          }

          usort($messages, "cmp");


      return View::make('messages')->withBlogs($userBlogs)->withUser($user)->withMessages($messages);
    }

    public function sendMessage()
    {
      $receiver = Blog::where('name', '=', Input::get('receiver'))->first();
      if($receiver)
      {
        if($receiver->followers->contains(Sentry::getUser()->id))
        {
          $sender = Blog::where('name', '=', Input::get('sender'))->first();
          $message = new Message();
          $message->message = Input::get('message');
          $message->sender()->associate($sender);
          $message->receiver()->associate($receiver);
          $message->save();
          return Redirect::route('messages')->withSuccess('Message Sent');
        }
        else
        {
          return Redirect::route('messages')->withError('You must follow the blog before sending a fan mail.');
        }
      }
      else
      {
        return Redirect::route('messages')->withError('Receiver Not Found');
      }
    }

    public function deleteMessage($id)
    {
      $message = Message::find($id);
      $blog_ids = array();
      $blogs = Blog::where('user_id', '=', Sentry::getUser()->id)->get();
      foreach ($blogs as $blog) {
        array_push($blog_ids, $blog->id);
      }
      if(in_array($message->receiver_id, $blog_ids))
      {
        $message->delete();
        return Redirect::route('messages')->withSuccess('Message Delete');
      }
      else
      {
        return Redirect::route('messages')->withError('You don\'t have enough authorized.');
      }
    }

    public function blogMessages($name)
    {
      $user = User::find(Sentry::getUser()->id);
      $userBlogs = $user->blogsWithMessages->all();
      $blog = Blog::where('name', '=', $name)->first();
      $messages = $blog->receivedMessages->all();
      return View::make('blogMessages')->withBlogs($userBlogs)->withUser($user)->withMessages($messages)->withUserblog($blog);
    }

    public function settings($name)
    {
      $currentBlog = Blog::where('user_id', Sentry::getUser()->id)->where('name', '=', $name)->first();
      $user = User::find(Sentry::getUser()->id);
      $userBlogs = $user->blogs->all();
      return View::make('blogsettings')->withBlogs($userBlogs)->withUser($user)->withCurrentblog($currentBlog);
    }

    public function changeUsername($name)
    {
      $blog = Blog::where('user_id', Sentry::getUser()->id)->where('name', '=', $name)->first();
      $user = Sentry::getUser();
      if($user->checkPassword(Input::get('password')))
      {
        $blog->name = htmlentities(Input::get('name'));
        $blog->save();
        return Redirect::route('blogsettings', array('name' => Input::get('name')))->withSuccess('Username Updated');
      }
      else
      {
        return Redirect::route('blogsettings', array('name' => $name))->withError('Incorrect Password. Try Again.');
      }
    }

    public function changeDomain($name)
    {
      $blog = Blog::where('user_id', Sentry::getUser()->id)->where('name', '=', $name)->first();
      $blog->domain = Input::get('domain');
      $blog->save();
      return Redirect::route('blogsettings', array('name' => $name))->withSuccess('Username Updated');
    }

    public function changeInfo($name)
    {
      $blog = Blog::where('user_id',Sentry::getUser()->id)->where('name', '=', $name)->first();
	  //$blog = Blog::where('name', '=', $name)->first();
      $config = json_decode($blog->config, true);
      $config['title'] = Input::get('title');
      $config['description'] = Input::get('description');
      $blog->config = json_encode($config);
      $blog->save();
      return Redirect::route('blogsettings', array('name' => $name))->withSuccess('Settings Updated');
    }

    public function changeProfilePicture($name)
    {
      $blog = Blog::where('user_id',Sentry::getUser()->id)->where('name', '=', $name)->first();
      $config = json_decode($blog->config, true);
      $validator = Validator::make(
                              Input::all(),
                              array('picture' => 'required|mimes:png,gif,jpeg|max:5120')
      );

      if ($validator->fails())
      {
        return Redirect::route('blogsettings', array('name' => $name))->withErrors($validator->messages());
      }
      else
      {
		$fileName = md5(mt_rand()) . Input::file('picture')->getClientOriginalName();
        Input::file('picture')->move('uploads/pictures', $fileName);
        $config['picture'] = 'uploads/pictures/'.$fileName;
        $blog->config = json_encode($config);
        $blog->save();
        return Redirect::route('blogsettings', array('name' => $name))->withSuccess('Settings Updated');
      }
    }

    public function reblog()
    {
	  $blog_id = Input::get('blog');
      $currentBlog = Blog::where('id', '=', $blog_id)->first();
	  if (!$currentBlog) dd("Blog #{$blog_id} is not found!");
	  $originalpost = Post::where('id', '=', Input::get('originalpostid'))->with('regularPost')->first();
      $blog = $originalpost->blog;
      $post = new Post();
      $post->type = 'reblogged';
      $p = $post->blog();
      $p->associate($currentBlog); //!!!
      $post->search_index = $originalpost->search_index;
      $post->save();
      $tags = $originalpost->tags;
      foreach($tags as $tag)
      {
        $tag->posts()->attach($post);
      }

      $content = array('comment'    => htmlentities($_POST['comment'])
        );

      $reblogged_post = new RebloggedPost();
      $reblogged_post->type = $originalpost->regularPost->type;
      $reblogged_post->content = json_encode($content);
      $reblogged_post->originalPost()->associate($originalpost);
      $reblogged_post->post()->associate($post);
      $reblogged_post->save();
      return Redirect::route('dashboard')->withSuccess('Post reblogged successfully');
    }

    public function publicBlog($username,$name = 'default')
    {
	  $name = mb_strtolower($name);
	
	
	  $userinfo = User::where('username', '=', $username)->first();
	  
	
      $blog = Blog::where('name', '=', $name)->where('user_id', '=', $userinfo->id)->first();
      Log::info('Blog = '.print_r($blog, true));

        /*if($_SERVER["SERVER_NAME"]!=$blog->domain&&$_SERVER["SERVER_NAME"]!=Config::get('database.domain')&&$_SERVER["SERVER_NAME"]!=$name.".".Config::get('database.domain'))
        {
          App::abort(404);
        }*/
      
	  //$user = User::find(Sentry::getUser()->id);
	 
      $currentBlog = Blog::where('name', '=', $name)->where('user_id', '=', $userinfo->id)->first();
	  if (!$currentBlog)
	  {
		App::abort(404);
	  }
      $posts = Post::where('blog_id', '=', $currentBlog->id)
		  ->with('regularPost', 'rebloggedPost', 'tags', 'blog')
		  ->orderBy('created_at', 'desc')->paginate(10);
	  
      return View::make('theme')->withPosts($posts)->withBlog($currentBlog)->withUser($username);
    }

    public function customiseBlog($name)
    {
      $currentBlog = Blog::where('name', '=', $name)->first();
      $user = User::find(Sentry::getUser()->id);
      $userBlogs = $user->blogs->all();
      return View::make('customise')->withBlogs($userBlogs)->withCurrentblog($currentBlog);
    }

    public function processCustomiseBlog($name)
    {
      $currentBlog = Blog::where('name', '=', $name)->first();
      $config = json_decode($currentBlog->config, true);
      $config['customcss'] = Input::get('customcss');
      $currentBlog->config = json_encode($config);
      $currentBlog->save();
      return Redirect::route('customise', array('name' => $currentBlog->name))->withSuccess('Custom CSS Updated');
    }

    public function redirect($anything)
    {
      return Redirect::to('http://'.Config::get('database.domain').'/'.$anything);
    }

  }
