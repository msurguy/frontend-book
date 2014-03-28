<?php

class Tag extends Eloquent
{
  public function posts()
  {
    return $this->belongsToMany('Post');
  }
}