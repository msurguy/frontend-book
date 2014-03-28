<?php

class Post extends Eloquent
{
  public function tags()
  {
    return $this->belongsToMany('Tag');
  }
}