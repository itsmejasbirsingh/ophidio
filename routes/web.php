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

Route::group([ 'middleware' => 'auth' ], function () {

    // Render dashboard.
	Route::get('/admin', function () {
	    return view('admin.dashboard');
	});

	// Add user form.
	Route::get('/admin/user/add/', 'UserController@add')->name('addUser');

	// Add user.
	Route::post('/admin/user/add/', 'UserController@store')->name('saveUser');

	// Edit user.
	Route::get('/admin/user/{user}/edit', 'UserController@edit')->name('editUser');

	// View user.
	Route::get('/admin/user/{user}/', 'UserController@view')->name('viewUser');

	// Update user.
	Route::post('/admin/user/{user}/update', 'UserController@update')->name('updateUser');

	// get all users.
	Route::get('/admin/users/', 'UserController@index')->name('listUsers');

	// Deactivate user.
	Route::post('/admin/user/{user}/deactivate', 'UserController@deactivate')->name('deactivateUser');

	// Activate user.
	Route::post('/admin/user/{user}/activate', 'UserController@activate')->name('activateUser');

	// Add role form.
	Route::get('/admin/role/add/', 'RoleController@add')->name('addRole');

	// Add role.
	Route::post('/admin/role/add/', 'RoleController@store')->name('saveRole');

	// Update role.
	Route::post('/admin/role/{role}/update', 'RoleController@update')->name('updateRole');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
