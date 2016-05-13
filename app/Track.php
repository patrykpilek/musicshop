<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'tracks';

    protected $fillable = [
        'track_name',
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}
