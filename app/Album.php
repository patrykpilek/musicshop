<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'artist_id', 'album_name', 'description', 'price', 'format', 'category', 'image',
    ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function tracks(){
        return $this->hasMany(Track::class);
    }

    public function orderDetails(){
        return $this->belongsTo(OrderDetails::class);
    }
}
