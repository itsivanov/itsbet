<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPublishedPosts()
    {
      // $posts = Post::latest('id')// - сортировка DESC
      //     ->get();
      $posts = $this->latest('id')->published()->get();

      return $posts;
    }

    public function scopePublished($query)
    {
      $query->where('title', '=', 'test1' )
        ->orWhere('id', '=', '35' );

    }
}
