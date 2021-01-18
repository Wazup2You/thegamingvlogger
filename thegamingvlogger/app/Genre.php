<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $fillable = ['title'];

    public function gameItems()
    {
        return $this->hasMany(GameItem::class);
    }
}
