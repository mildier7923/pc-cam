<?php

use Spatie\Permission\Models\Role;

/* ------------------------------------------------------ *
* Public Routes
* ------------------------------------------------------ */
Route::get('/test', function (){});
/*
 * Auth
 * ------------------------------------------------------ *
 */
Route::redirect('/', '/login', 301);
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

/*
 * Foorgot Password
 * ------------------------------------------------------ *
 */
Route::get('/forgot-password', 'Auth\ForgotPasswordController@index');
Route::post(
	'/forgot-password',
	'Auth\ForgotPasswordController@sendResetLinkEmail'
);

/*
 * Reset Password
 * ------------------------------------------------------ *
 */
Route::post('/reset-password', 'Auth\ResetPasswordController@reset');
Route::get(
	'/reset-password/{token?}',
	'Auth\ResetPasswordController@index'
)->name('password.reset');


/* ------------------------------------------------------ *
 * Protected Routes
 * ------------------------------------------------------ */
Route::group(['middleware' => ['auth:web']], function () {

	Route::group(['prefix' => 'home'], function () {
		Route::view('/', 'dashboard.pages.home')->name('home');
	});

	Route::group(['prefix' => 'contacts'], function () {
		Route::view('/', 'dashboard.pages.contact')->name('contact');
		Route::view('/interview', 'dashboard.pages.contact-interview')->name('contact.interview');
		Route::get('/get-all/{status}', 'ContactController@getAll');
		Route::put('/status-update/{contact}', 'ContactController@update');
		Route::delete('/delete/{contact}', 'ContactController@delete');
	});

	Route::group(['prefix' => 'users'], function () {
		Route::view('/', 'dashboard.pages.user')->name('user');
		Route::get('/get-all-roles', 'UserController@getAllRoles');
		Route::get('/get-all', 'UserController@getAll');
		Route::get('/get/{user}', 'UserController@getUser');
		Route::post('/store', 'UserController@storeUser');
		Route::post('/update/{user}', 'UserController@updateUser');
		Route::delete('/delete/{user}', 'UserController@deleteUser');
	});

});
