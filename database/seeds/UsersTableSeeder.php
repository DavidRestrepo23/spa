<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\User::create([
        	'name' => 'David',
            'lastname' => 'Restrepo',
            'email' => 'drv404@hotmail.com',
        	'password' => bcrypt('admin'),
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis aut fugit amet natus pariatur',
            'gender' => 'male',
            'nickname' => 'chuck666',
            'url_facebook' => 'https://www.facebook.com/daviddeoz.restrepo',
            'url_instagram' => 'https://www.instagram.com/deathrestrepo/',
            'status' => 'active',
        ]);

        factory(App\User::class)->times(20)->create();

    }
}
