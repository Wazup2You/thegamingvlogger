<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GameItem;
use Faker\Generator as Faker;

$factory->define(GameItem::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'title' => $faker->sentence,
        'image' => $faker->sentence,
        'description' => $faker->paragraph,
        'download_link' => $faker->sentence,
        'genre_id' => factory(\App\Genre::class)

    ];
});
