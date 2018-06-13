<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('autores', 'Web\ProfileController@index');

Route::namespace('Web')->group(function(){
	Route::get('/', 'HomeController@index');
	Route::get('/busqueda/', 'SearchController@show');
	Route::get('/{slug}', 'PostController@show');
	Route::get('/categoria/{slug}', 'CategoryController@show');
	Route::get('/perfil/autor/{nickname}', 'ProfileController@show');
	Route::get('/etiqueta/{slug}', 'TagController@show');
	Route::get('/datajsons/json', 'SearchController@data');
});


/* Login */

Route::get('/admin', function () {
    return redirect('admin/login');
});

Route::namespace('Admin\Auth')->group(function(){
	
	Route::get('admin/login', 'LoginController@showLoginForm');
	Route::get('admin/auth/logout', 'LoginController@logout')->name('logout');
	Route::post('admin/auth/login', 'LoginController@login')->name('login');
});

/* Login */

/*Dashboard*/
Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('dashboard')->middleware('status');
/*Dashboard*/

/*Blog*/
Route::prefix('admin/dashboard')->namespace('Admin')->group(function(){
	Route::resource('posts', 'PostController');	
	Route::resource('categories', 'CategoryController');
	Route::resource('tags', 'TagController');
	Route::resource('users', 'UserController');
	Route::resource('profiles', 'ProfileController');
	Route::resource('security', 'SecurityController');
	Route::get('/publicities/{id}', 'PublicityController@destroy')->name('publicity');
});
/*Blog*/

/*Permissions and Roles*/
Route::prefix('admin/dashboard')->namespace('Admin\Permissions')->group(function(){
	Route::resource('roles', 'RolController');
	Route::resource('permissions', 'PermissionController');
});
/*Permissions and Roles*/

