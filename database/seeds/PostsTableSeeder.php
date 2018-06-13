<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class)->times(100)->create()->each(function(App\Post $post){
        	$post->tags()->attach([
        		rand(1,5),
        		rand(5,10),
        		rand(10,15),
        	]);

        });

        factory(App\Post::class)->create()->each(function (App\Post $post) {
            $post->meta()->saveMany(factory(App\Meta::class, 1)->make()); //Para cada post me crear una metadata
        });


    }
}
