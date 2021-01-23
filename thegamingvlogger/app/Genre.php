<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['title'];

    public function gameItems()
    {
        return $this->hasMany(GameItem::class);
    }

    public function specGameItem($gen)
    {
        return $this->gameItems()
            ->where('title', 'LIKE', '%'.$gen.'%')
            ->get();
    }
}
