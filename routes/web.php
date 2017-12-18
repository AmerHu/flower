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

use App\Category;

Auth::routes();

Route::get('/', 'FlowersController@index')->name('home');

Route::get('/flowers/{id}', 'FlowersController@show');

Route::get('/flowers/cate/{id}', 'CategoriesController@index');

Route::get('/flowers/noCate/', 'CategoriesController@noCate');

Route::get('/cms/admin', 'CMSController@index');
Route::get('/cms/flowers/{id}', 'CMSController@show');
Route::get('/cms/{id}/edit', 'CMSController@edit');
Route::get('/cms/create', 'CMSController@create');
Route::post('/cms/create', 'CMSController@store');
Route::post('/cms/{id}/edit', 'CMSController@update');
Route::get('/cms/delete/{id}', 'CMSController@destroy');

Route::get('/logout', 'CMSController@logout');

Route::post('/cms/flower/img/{id}', 'ImagesController@store');
