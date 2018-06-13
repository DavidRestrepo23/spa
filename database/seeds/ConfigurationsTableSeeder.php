<?php

use Illuminate\Database\Seeder;
use App\User;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$id = 1;
        $user = User::find($id);
        $user->assignRole('all-access');
        
    }
}
