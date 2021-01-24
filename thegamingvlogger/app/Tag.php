<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function gameItems() {
        return $this->belongsToMany(GameItem::class);
    }
}
