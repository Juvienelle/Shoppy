<?php

Route::get('test/', function() {
    dd(auth()->user()->first_name);
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');



/* Authentication */
Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', 'RegistrationController@create')->name('register');
    Route::post('register', 'RegistrationController@store');

    Route::get('login', 'SessionsController@create')->name('login');
    Route::post('login', 'SessionsController@store');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('profile/update', 'ProfileController@create')->name('profile.update');
    Route::post('profile', 'ProfileController@store')->name('profile');

    Route::get('logout', 'SessionsController@destroy')->name('logout');
});

/* Product Handling */
Route::post('search', 'SearchController@search')->name('search');

/* Cart */
Route::get('cart', 'CartsController@index')->name('cart');
Route::post('product/{id}/cart', 'CartsController@add')->name('product.add');
Route::post('product/{id}/updateQuantity', 'CartsController@updateQuantity')->name('product.quantity.update');
Route::post('product/{id}/remove', 'CartsController@remove')->name('product.remove');

/* Admin panel */
Route::get('cpanel', 'AdminController@index')->name('cpanel');
Route::get('product/create', 'ProductsController@create')->name('product.create')->middleware('product-create');
Route::post('product/create', 'ProductsController@store');
Route::get('product/{product}', 'ProductsController@show')->name('product.view');
Route::get('product/{product}/update', 'ProductsController@showUpdateForm')->name('product.update')->middleware('product-update');
Route::post('product/{product}/update', 'ProductsController@update');

/* Checking out */
Route::post('checkout', 'PaymentsController@create')->name('checkout');