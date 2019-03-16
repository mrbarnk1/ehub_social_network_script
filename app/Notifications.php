<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    //
    protected $fillable = ['user_id', 'content', 'status'];
}
