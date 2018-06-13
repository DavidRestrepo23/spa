<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

    	/*Permissions Categories*/

	    	Permission::create([
	        	'name' => 'create.categories',
	        	'description' => 'Crear Categorias',
	        ]);

	        Permission::create([
	        	'name' => 'destroy.categories',
	        	'description' => 'Eliminar Categorias'
	        ]);

			Permission::create([
	        	'name' => 'edit.categories',
	        	'description' => 'Editar Categorias',
	        ]);        

		/*Permissions Categories*/

		/*Permissions Tags*/

	    	Permission::create([
	        	'name' => 'create.tags',
	        	'description' => 'Crear Etiquetas',
	        ]);

	        Permission::create([
	        	'name' => 'destroy.tags',
	        	'description' => 'Eliminar Etiquetas'
	        ]);

			Permission::create([
	        	'name' => 'edit.tags',
	        	'description' => 'Editar Etiquetas',
	        ]);        

		/*Permissions Tags*/

		/*Permissions Users*/

			Permission::create([
	        	'name' => 'index.users',
	        	'description' => 'Ver Usuarios',
	        ]);

	    	Permission::create([
	        	'name' => 'create.users',
	        	'description' => 'Crear Usuarios',
	        ]);

	        Permission::create([
	        	'name' => 'destroy.users',
	        	'description' => 'Eliminar Usuarios'
	        ]);

			Permission::create([
	        	'name' => 'edit.users',
	        	'description' => 'Editar Usuarios',
	        ]);

		/*Permissions Users*/


		/*Permissions Roles*/

			Permission::create([
	        	'name' => 'index.roles',
	        	'description' => 'Ver Roles',
	        ]);

	    	Permission::create([
	        	'name' => 'create.roles',
	        	'description' => 'Crear Roles',
	        ]);

	        Permission::create([
	        	'name' => 'destroy.roles',
	        	'description' => 'Eliminar Roles'
	        ]);

			Permission::create([
	        	'name' => 'edit.roles',
	        	'description' => 'Editar Roles',
	        ]);

		/*Permissions Users*/

		/*Permissions*/


	    	Permission::create([
	        	'name' => 'add.permissions',
	        	'description' => 'Asignar Permisos',
	        ]);

	        Permission::create([
	        	'name' => 'destroy.permissions',
	        	'description' => 'Eliminar Permisos'
	        ]);

			Permission::create([
	        	'name' => 'edit.permissions',
	        	'description' => 'Editar Permisos',
	        ]);

		/*Permissions*/

		/*Menu Top*/

	    	Permission::create([
	        	'name' => 'display.menu.config',
	        	'description' => 'Mostrar el botón de configuración',
	        ]);

		/*Menu Top*/


    }
}
