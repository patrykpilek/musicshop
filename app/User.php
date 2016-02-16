<?php

namespace Musicshop;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'address',
    ];

    protected $hidden = [
        'password', 'is_admin', 'remember_token',
    ];
}
