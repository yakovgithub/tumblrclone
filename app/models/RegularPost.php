<?php

  use Illuminate\Database\Eloquent\Model as Model;

  class RegularPost extends Model{

    protected $table = 'regular_posts';
    protected $softDelete = true;

    public function post()
    {
      return $this->belongsTo('Post');
    }

  }