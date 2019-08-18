<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'user_id' => $faker->name,
        'title'     => $faker->sentence,
        'description'  => $faker->sentence,
        'status'     => $faker->sentence,
        'image'     => 'https://cdn.pixabay.com/photo/2018/03/03/03/11/tree-3194803__340.jpg',
        'video_path'  => '',
    ];
});
