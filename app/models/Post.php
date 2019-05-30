<?php

  use Illuminate\Database\Eloquent\Model as Model;

  class Post extends Model{

    protected $softDelete = true;

    public function blog()
    {
      return $this->belongsTo('Blog')->with('author');
    }

    public function regularPost()
    {
      return $this->hasOne('RegularPost');
    }

    public function rebloggedPost()
    {
      return $this->hasOne('RebloggedPost')->with('originalPost');
    }

    public function tags()
    {
      return $this->belongsToMany('Tag','posts_tags','post_id','tag_id');
    }

    public function rebloggedPosts()
    {
      return $this->hasMany('RebloggedPost', 'original_post_id');
    }

    public function likers()
    {
      return $this->belongsToMany('User', 'likes')->withTimestamps();
    }

  }