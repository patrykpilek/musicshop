<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'album_name', 'description',
    ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function tracks(){
        return $this->hasMany(Track::class);
    }
}
