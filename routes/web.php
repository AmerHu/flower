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

Route::get('/categories', 'CategoriesController@setting');

Route::post('/cateCreate', 'CategoriesController@store');

Route::get('/cate/edit/{id}', 'CategoriesController@edit');
Route::post('/cate/edit/{id}', 'CategoriesController@update');
Route::get('/cate/delete/{id}', 'CategoriesController@destroy');

Route::get('/img/edit/{id}', 'ImagesController@edit');
Route::post('/img/edit/{id}', 'ImagesController@update');
Route::get('/img/delete/{id}', 'ImagesController@destroy');

Route::get('/user/edit/{id}', 'UsersController@edit');
Route::post('/user/edit/{id}', 'UsersController@update');
Route::get('/user/delete/{id}', 'UsersController@destroy');
Route::get('/user/index', 'UsersController@index');


Route::get('/cms/admin', 'CMSController@index');
Route::get('/cms/flowers/{id}', 'CMSController@show');
Route::get('/cms/{id}/edit', 'CMSController@edit');
Route::get('/cms/create', 'CMSController@create');
Route::post('/cms/create', 'CMSController@store');
Route::post('/cms/{id}/edit', 'CMSController@update');
Route::get('/cms/delete/{id}', 'CMSController@destroy');

Route::get('/logout', 'CMSController@logout');

Route::post('/cms/flower/img/{id}', 'ImagesController@store');


Route::get('tipo/{type}', 'SweetController@notification');