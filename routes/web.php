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

use \Illuminate\Http\Request;

Route::get('/', 'PostController@index')
    ->name('home');



Route::resource('section', 'SectionController');
Route::resource('tag', 'TagController');
Route::resource('post', 'PostController');

// Route::get('/users/{$name?}', function ($name = 'Ariel'){
// 	return $name;
// });

