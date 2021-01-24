<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameItem extends Model
{
    protected $fillable = ['title', 'description', 'image', 'genre_id', 'download_link', 'user_id'];
    //protected $guarded =[];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
