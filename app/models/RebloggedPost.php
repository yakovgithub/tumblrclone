<?php

class RebloggedPost extends \Eloquent {

  protected $softDelete = true;

  public function post()
  {
    return $this->belongsTo('Post');
  }

  public function originalPost()
  {
    return $this->belongsTo('Post', 'original_post_id')->with('regularPost', 'blog', 'tags');
  }

}
