<?php

Route::get('/', 'IndexController@index');
Route::get('/service/{slug}', 'ServiceController@service');

Route::get('/page/{slug}', 'PageController@index');

Route::get('/posts', 'PostController@index');
Route::get('/post/{slug}', 'PostController@post');

Auth::routes(['verify' => true]);

Route::get('/profile', 'Auth\UserController@profile')->middleware('verified');
Route::get('/profile/edit', 'Auth\UserController@edit');
Route::post('/profile/update', 'Auth\UserController@update');

Route::get('/confirm_email', 'Auth\RegisterController@confirm_email');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/api/operation_save', 'FrvController@operation_save');

// Route::get('/frv_prof', 'FrvController@frv_prof');

Route::get('/profile/frv_prof', 'FrvController@frv_prof');
// Route::get('/frv', 'FrvController@index');