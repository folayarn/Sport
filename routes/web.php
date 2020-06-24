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

Route::get('/', 'SportsPostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'SportsPostController');
Route::post('posts', 'SportsPostController@updateCount')->name('posts.count');


Route::get('/category/{id}', 'SportsPostController@showCat');
Route::get('/team/{id}', 'SportsPostController@showTeam');

Route::get('/createVideo', 'SportsPostController@createVideo');
Route::post('store', 'SportsPostController@storeVideo');
Route::get('/', 'SportsPostController@index');
Route::get('/users/login','Auth\RegularLoginController@showLoginForm')->name('regular.login');

Route::post('/users/login','Auth\RegularLoginController@login')->name('regular.login.submit');
