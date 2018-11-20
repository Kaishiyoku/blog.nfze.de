<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->firstName,
        'content' => $faker->text,
        'category_id' => Category::first()->id,
        'published_at' => $faker->date(),
    ];
});
