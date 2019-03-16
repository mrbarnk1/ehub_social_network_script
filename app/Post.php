<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ['post_token', 'user_id', 'status', 'type', 'likes', 'content', 'images'];

    public static function images()
    {
    	return $this->hasMany(PostImages::class);
    }
}
