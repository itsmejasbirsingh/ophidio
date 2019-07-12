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
	Route::view('/admin', 'admin.dashboard');

	/*
		Users
	*/

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

	/*
		Roles
	*/

	// Add role form.
	Route::get('/admin/role/add/', 'RoleController@add')->name('addRole');

	// Add role.
	Route::post('/admin/role/add/', 'RoleController@store')->name('saveRole');

	// Update role.
	Route::post('/admin/role/{role}/update', 'RoleController@update')->name('updateRole');

	/*
		Products
	*/

	// get all Products.
	Route::get('/admin/products/', 'ProductController@index')->name('listProducts');

	// Add Product form.
	Route::get('/admin/product/add', 'ProductController@add')->name('addProduct');

	// Save product.
	Route::post('/admin/product/add', 'ProductController@store')->name('saveProduct');

	// Update product.
	Route::post('/admin/product/{product}/update', 'ProductController@update')->name('updateProduct');

	/*
		Product category
	*/

	// Add product category.
	Route::get('/admin/product/category/add', 'ProductCategoryController@add')->name('addCategory');

	// Save product category.
	Route::post('/admin/product/category/add', 'ProductCategoryController@store')->name('saveCategory');

	// Update product category.
	Route::post('/admin/product/category/{product}/update', 'ProductCategoryController@store')->name('updateCategory');

});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


/*
	Public facing
*/

// Show products.
Route::get('/', 'ShopController@index')->name('shopping');

Route::get('/product/{product}', 'ShopController@productSingle')->name('product_single');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@store')->name('saveCart');

Route::patch('/cart/{item_id}/update', 'CartController@update');

Route::post('/cart/empty', 'CartController@empty')->name('emptyCart');

Route::post('/cart/remove/{item_id}', 'CartController@destroy')->name('cartRemoveItem');