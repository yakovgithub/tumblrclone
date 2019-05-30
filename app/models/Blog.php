<?php

  use Illuminate\Database\Eloquent\Model as Model;

  class Blog extends Model{

    public function author()
    {
      return $this->belongsTo('User','user_id');
    }

    public function posts()
    {
      return $this->hasMany('Post')->with('regularPost', 'rebloggedPost', 'tags', 'blog');
    }

    public function regularPosts()
    {
      return $this->hasMany('Post')->where('type', 'regular')->with('regularPost', 'tags');
    }

    public function rebloggedPosts()
    {
      return $this->hasMany('Post')->where('type', 'reblogged')->with('rebloggedPost', 'tags');
    }

    public function page()
    {
      return $this->hasMany('Page');
    }

    public function followers()
    {
      return $this->belongsToMany('User', 'follows')->withTimestamps();
    }

    public function receivedMessages()
    {
      return $this->hasMany('Message', 'receiver_id');
    }

    public function sentMessages()
    {
      return $this->hasMany('Message', 'sender_id');
    }

  }