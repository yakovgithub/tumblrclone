<?php

  use Illuminate\Database\Eloquent\Model as Model;

  class Throttle extends Model{

    public function user()
    {
      return $this->hasOne('User');
    }

  }