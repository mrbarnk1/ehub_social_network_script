<?php

// Copyright Bankole Emmnauel 2019 
// mrbarnk.COM

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'last_name', 'dob', 'mob', 'yob', 'gender', 'city', 'country', 'about', 'school', 'school_from', 'school_to', 'school_about', 'school_is_grad', 'work', 'work_as', 'work_from', 'work_to', 'work_city', 'work_decription', 'intrests', 'follow', 'notifications', 'message', 'tag', 'sound', 'passwords', 'following', 'followers', 'email', 'is_verified', 'is_admin', 'verification_code', 'email_verified_at', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}
