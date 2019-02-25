<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey='AlbumId';
    public $timestamps = false;

    public function artist(){
        return $this->belongsTo('App\Artist','ArtistId');
    }
}
