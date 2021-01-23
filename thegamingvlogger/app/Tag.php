<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function gameItems() {
        return $this->belongsToMany(GameItem::class, 'game_item_tag');
    }
}



