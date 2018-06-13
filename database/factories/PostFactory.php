<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

	$title = $faker->sentence(3);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'excerpt' => $faker->text(128),
        'body' => $faker->realText(500),
        'status' => $faker->randomElement(['DRAFT','PUBLISHED']),
        'file' => $faker->imageUrl($width=870, $height=450),
        'views' => rand(1,20),
        'user_id' => rand(1,20),
        'category_id' => rand(1,5),
    ];
});
