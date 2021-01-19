<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameItem extends Model
{
    public $fillable = ['title', 'description', 'image', 'genre_id', 'download_link'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
