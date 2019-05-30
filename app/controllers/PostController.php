<?php

  class PostController extends BaseController {

    public function saveText()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
	    $userinfo = User::find(Sentry::getUser()->id);
	  
	  
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();

        $post = new Post();
        $post->type = 'regular';
        $post->blog()->associate($blog);
        $post->search_index = htmlentities($_POST['title'].'-'.$_POST['tags']);
        $post->save();
        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
          }
        }

        $content = array('title'    => htmlentities($_POST['title']),
                         'content'  => htmlentities($_POST['content'])
        );
        $regular_post = new RegularPost();
        $regular_post->type = 'text';
        $regular_post->content = json_encode($content);
        $regular_post->post()->associate($post);
        $regular_post->save();
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function saveQuote()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
	    
		$userinfo = User::find(Sentry::getUser()->id);
	    $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		
        

        $post = new Post();
        $post->type = 'regular';
        $post->blog()->associate($blog);
        $post->search_index = htmlentities($_POST['tags']);
        $post->save();

        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
		  }
        }

        $content = array('content'  => htmlentities($_POST['content']),
                         'source'   => htmlentities($_POST['source'])
        );
        $regular_post = new RegularPost();
        $regular_post->type = 'quote';
        $regular_post->content = json_encode($content);
        $regular_post->post()->associate($post);
        $regular_post->save();
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function saveLink()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
	    $userinfo = User::find(Sentry::getUser()->id);
	    $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		
        //$blog = Blog::where('name', '=', $_POST['blog'])->first();

        $post = new Post();
        $post->type = 'regular';
        $post->blog()->associate($blog);
        $post->search_index = htmlentities($_POST['title'].' - '.$_POST['tags']);
        $post->save();

        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
		  }
        }

        $content = array('url'  => htmlentities($_POST['url']),
                         'title'  => htmlentities($_POST['title']),
                         'caption'   => htmlentities($_POST['caption'])
        );
        $regular_post = new RegularPost();
        $regular_post->type = 'link';
        $regular_post->content = json_encode($content);
        $regular_post->post()->associate($post);
        $regular_post->save();
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function saveChat()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        $userinfo = User::find(Sentry::getUser()->id);
	    $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		
		//$blog = Blog::where('name', '=', $_POST['blog'])->first();

        $post = new Post();
        $post->type = 'regular';
        $post->blog()->associate($blog);
        $post->search_index = htmlentities($_POST['title'].'-'.$_POST['tags']);
        $post->save();

        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
		  }
        }

        $content = array('title'    => htmlentities($_POST['title']),
                         'content'  => htmlentities($_POST['content'])
        );
        $regular_post = new RegularPost();
        $regular_post->type = 'chat';
        $regular_post->content = json_encode($content);
        $regular_post->post()->associate($post);
        $regular_post->save();
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function saveAudio()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        $validator = Validator::make(
                              Input::all(),
                              array('file' => 'required|max:10240')
        );

        if ($validator->fails())
        {
          dd(Input::file('file'));

          return Redirect::route('ashboard')->withError('A MP3 video which is less than 10MB is required');
        }
        else
        {

          if(Input::file('file')->getClientOriginalExtension() != 'mp3')
          {
            return Redirect::route('dashboard')->withError('Only MP3 file is supported');
          }

          Input::file('file')->move('uploads/audios', Input::file('file')->getClientOriginalName());
		  
		  $userinfo = User::find(Sentry::getUser()->id);
	      $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		

          //$blog = Blog::where('name', '=', $_POST['blog'])->first();

          $post = new Post();
          $post->type = 'regular';
          $post->blog()->associate($blog);
          $post->search_index = htmlentities($_POST['tags']);
          $post->save();

          foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
          {
            if($tag != '')
            {
              if(Tag::where('name', '=', $tag)->count())
              {
                Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
              }
              else
              {
                $tagObject = new Tag();
                $tagObject->name = $tag;
                $tagObject->save();
                $tagObject->posts()->attach($post->id);
              }
            }
          }

          $content = array('url'    => 'uploads/audios/'.Input::file('file')->getClientOriginalName(),
                           'filename' => Input::file('file')->getClientOriginalName()
          );
          $regular_post = new RegularPost();
          $regular_post->type = 'audio';
          $regular_post->content = json_encode($content);
          $regular_post->post()->associate($post);
          $regular_post->save();
        }
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function saveVideo()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        $validator = Validator::make(
                              Input::all(),
                              array('file' => 'required|max:40960')
        );

        if ($validator->fails())
        {
          return Redirect::route('dashboard')->withError('A MP4 video which is less than 40MB is required');
        }
        else
        {

          if(Input::file('file')->getClientOriginalExtension() != 'mp4')
          {
            return Redirect::route('dashboard')->withError('Only MP4 file is supported');
          }

          Input::file('file')->move('uploads/videos', Input::file('file')->getClientOriginalName());

          $userinfo = User::find(Sentry::getUser()->id);
	      $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		
		  //$blog = Blog::where('name', '=', $_POST['blog'])->first();
		  

          $post = new Post();
          $post->type = 'regular';
          $post->blog()->associate($blog);
          $post->search_index = htmlentities($_POST['tags']);
          $post->save();

          foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
          {
            if($tag != '')
            {
              if(Tag::where('name', '=', $tag)->count())
              {
                Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
              }
              else
              {
                $tagObject = new Tag();
                $tagObject->name = $tag;
                $tagObject->save();
                $tagObject->posts()->attach($post->id);
              }
            }
          }

          $content = array('url'    => 'uploads/videos/'.Input::file('file')->getClientOriginalName(),
                           'filename' => Input::file('file')->getClientOriginalName()
          );
          $regular_post = new RegularPost();
          $regular_post->type = 'video';
          $regular_post->content = json_encode($content);
          $regular_post->post()->associate($post);
          $regular_post->save();
        }
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function savePicture()
    {
      if(isset($_POST['reblogged']))
      {
        $type = 'reblogged';
      }
      else
      {
        $files = array();
        foreach(Input::file('file') as $file){
          $rules = array(
            'file' => 'required|mimes:png,gif,jpeg|max:5120'
          );
          $validator = \Validator::make(array('file'=> $file), $rules);
          if($validator->fails()){
            return Redirect::route('dashboard')->withErrors($validator->messages());
          }
        }
        foreach(Input::file('file') as $file){
          $file->move('uploads/pictures', $file->getClientOriginalName());
          $files[] = 'uploads/pictures/'.$file->getClientOriginalName();
        }
        
		$userinfo = User::find(Sentry::getUser()->id);
	    $blog = Blog::where('name', '=', $_POST['blog'])->where('user_id', '=', $userinfo->id)->first();
		
		
        //$blog = Blog::where('name', '=', $_POST['blog'])->first();

        $post = new Post();
        $post->type = 'regular';
        $post->blog()->associate($blog);
        $post->search_index = htmlentities($_POST['tags']);
        $post->save();
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
          }
        }

        $content = array('files' => $files);
        $regular_post = new RegularPost();
        $regular_post->type = 'image';
        $regular_post->content = json_encode($content);
        $regular_post->post()->associate($post);
        $regular_post->save();
      }

      return Redirect::route('dashboard')->withSuccess('Post added successfully');
    }

    public function delete($id)
    {
      $post = Post::find($id);
      $reblogs = $post->rebloggedPosts()->get();

	foreach($reblogs as $reblog)
	{
		$reblogged_post = Post::find($reblog->post_id);

		$reblogged_post->delete();

	}

	$post->delete();

      return Redirect::route('dashboard');
    }

    public function edit($id)
    {
      $tags = array();
      $post = Post::where('id', '=', $id)->with('regularPost', 'rebloggedPost', 'tags')->first();
      foreach ($post->tags as $tag) {
        $tags[] = $tag->name;
      }
      $tags = implode(',', $tags);
      return View::make('editpost')->withPost($post)->withTags($tags);
    }

    public function update($id)
    {
      $post = Post::where('id', '=', $id)->with('regularPost', 'rebloggedPost', 'tags')->first();
      if($post->type == 'regular')
      {
        if($post->regularPost->type == 'text' || $post->regularPost->type == 'chat')
        {
          $content = json_decode($post->regularPost->content,true);
          $content['title'] = Input::get('title');
          $content['content'] = Input::get('content');
          $post->regularPost->content = json_encode($content);
          $post->regularPost->save();
        }
        elseif($post->regularPost->content == 'quote')
        {
          $content = json_decode($post->regularPost->content,true);
          $content['source'] = Input::get('source');
          $content['content'] = Input::get('content');
          $post->regularPost->content = json_encode($content);
          $post->regularPost->save();
        }
        $post->tags()->detach();
		$_POST['tags'] = str_replace('#',',',$_POST['tags']);
        foreach(explode(',',str_replace(' ', '', $_POST['tags'])) as $tag)
        {
          if($tag != '')
          {
            if(Tag::where('name', '=', $tag)->count())
            {
              Tag::where('name', '=', $tag)->first()->posts()->attach($post->id);
            }
            else
            {
              $tagObject = new Tag();
              $tagObject->name = $tag;
              $tagObject->save();
              $tagObject->posts()->attach($post->id);
            }
          }
        }
      }
      elseif($post->type == 'reblogged')
      {
        $content = json_decode($post->rebloggedPost->content,true);
        $content['comment'] = Input::get('comment');
        $post->rebloggedPost->content = json_encode($content);
        $post->rebloggedPost->save();
      }
      return Redirect::route('dashboard')->withSuccess('Post Updated');
    }

  }
