<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'order_Number', 'password', 'first_name', 'last_name', 'address', 'avatar',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function orderDetails(){
        return $this->belongsTo(OrderDetails::class);
    }
}
