<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->firstName,
        'content' => $faker->text,
        'published_at' => $faker->date(),
    ];
});
