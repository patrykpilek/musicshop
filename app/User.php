<?php

namespace Musicshop;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'address', 'avatar',
    ];

    protected $hidden = [
        'password', 'is_admin', 'remember_token',
    ];

    public function getAvatar(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function getName() {
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }
        return null;
    }

    public function getNameOrUsername() {
        return $this->getName() ?: $this->username;
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
