<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'biography' => $faker->realText($maxNbChars = 128),
        'avatar' => $faker->imageUrl($width=250, $height=250),
        'nickname' => $faker->username,
        'gender' => $faker->randomElement(['male','female','other']),
        'url_facebook' => $faker->url,
        'url_instagram' => $faker->url,
        'status' => $faker->randomElement(['active','inactive']),
        'remember_token' => str_random(10),
        
    ];
});
