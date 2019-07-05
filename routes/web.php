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

// Render dashboard.
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

// Add user form.
Route::get('/admin/user/add/', 'UserController@add')->name('addUser')->middleware('auth');

// Add user.
Route::post('/admin/user/add/', 'UserController@store')->name('saveUser')->middleware('auth');

// Add role.
Route::get('/admin/role/add/', 'UserRolesController@add')->name('addRole')->middleware('auth');

// Add user.
Route::post('/admin/role/add/', 'UserRolesController@store')->name('saveRole')->middleware('auth');

// Edit user.
Route::get('/admin/user/{user}/edit', 'UserController@edit')->name('editUser')->middleware('auth');

// Update user.
Route::post('/admin/user/{user}/update', 'UserController@update')->name('updateUser')->middleware('auth');

// get all users.
Route::get('/admin/users/', 'UserController@index')->name('listUsers')->middleware('auth');

// Deactivate user.
Route::post('/admin/user/{user}/deactivate', 'UserController@deactivate')->name('deactivateUser')->middleware('auth');

// Activate user.
Route::post('/admin/user/{user}/activate', 'UserController@activate')->name('activateUser')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
