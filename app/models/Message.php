<?php

class Message extends \Eloquent {

  public function sender()
  {
    return $this->belongsTo('Blog', 'sender_id');
  }

  public function receiver()
  {
    return $this->belongsTo('Blog', 'receiver_id');
  }

}