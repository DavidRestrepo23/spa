<?php

use Faker\Generator as Faker;

$factory->define(App\Meta::class, function (Faker $faker) {
    return [
        'description' => $faker->text(128),
        'keywords' => 'Lorem, ipsum, dolor, sit amet, consectetur, adipisicing, elit, Distinctio, repellendus, ea voluptas',
        'post_id' => $faker->numberBetween(1, 20),
      ];
});
