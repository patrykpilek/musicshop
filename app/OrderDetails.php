<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_id', 'album_id', 'accepted',
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function album(){
        return $this->hasMany(Album::class);
    }
}
