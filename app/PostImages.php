<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    //
    protected $fillable = ['image_path', 'post_token', 'status', 'user_id', 'images'];
    protected $guarded = [];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
