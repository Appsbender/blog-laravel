<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('home', 'PostsController@index');

Route::get('/', 'PostsController@index');

// Posts routes
Route::get('posts/create', 'PostsController@create');
Route::post('posts/create', 'PostsController@store');

// Categories routes
Route::get('categories', 'CategoriesController@index');
Route::get('categories/create', 'CategoriesController@create');
Route::post('categories/create', 'CategoriesController@store');
Route::get('categories/edit/{id}', 'CategoriesController@edit');
Route::post('categories/edit/{id}', 'CategoriesController@update');
Route::get('categories/destroy/{id}', 'CategoriesController@destroy');
Route::get('categories/{name}', 'CategoriesController@show');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
