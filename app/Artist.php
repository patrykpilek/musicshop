<?php

namespace Musicshop;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';

    protected $fillable = [
        'artist_name',
    ];

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function tracks(){
        return $this->hasMany(Track::class);
    }
}
