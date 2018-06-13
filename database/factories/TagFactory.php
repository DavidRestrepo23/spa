<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {

	$name = $faker->word(1);

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});
