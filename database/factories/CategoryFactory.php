<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    
    $name = $faker->sentence(2);
    return [
    	'name' => $name,
    	'slug' => str_slug($name),
    	'description' => $faker->text(128),
    ];
});
