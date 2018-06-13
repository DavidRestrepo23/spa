<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = Role::create([
        	'name' => 'all-access',
        ]);

        Role::create([
            'name' => 'Administrador',
        ]);

        Role::create([
            'name' => 'Autor',
        ]);


        $permission = Permission::pluck('name');
        $rol->givePermissionTo($permission);

    }
}
