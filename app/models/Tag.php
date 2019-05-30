<?php

  use Illuminate\Database\Eloquent\Model as Model;

  class Tag extends Model{

    public function posts()
    {
      return $this->belongsToMany('Post','posts_tags','tag_id','post_id');
    }

    public function regularPosts()
    {
      return $this->belongsToMany('Post','posts_tags','tag_id','post_id')->with('regularPost', 'tags');
    }

    public function rebloggedPosts()
    {
      return $this->belongsToMany('Post','posts_tags','tag_id','post_id')->with('rebloggedPost', 'tags');
    }

  }