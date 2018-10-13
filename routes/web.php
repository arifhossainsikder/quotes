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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/category/create', 'AdminCategoryController@create')->name('category.create');
Route::get('/admin/category', 'AdminCategoryController@index')->name('category.index');
Route::get('/admin/category/edit', 'AdminCategoryController@edit')->name('category.edit');
Route::get('/admin/author/create', 'AdminAuthorController@create')->name('author.create');
Route::get('/admin/author', 'AdminAuthorController@index')->name('author.index');
Route::get('/admin/author/view', 'AdminAuthorController@show')->name('author.view');
Route::get('/admin/author/edit', 'AdminAuthorController@edit')->name('author.edit');
Route::get('/admin/post/create', 'AdminPostController@create')->name('post.create');
Route::get('/admin/post', 'AdminPostController@index')->name('post.index');
Route::get('/admin/post/view', 'AdminPostController@show')->name('post.view');
Route::get('/admin/post/edit', 'AdminPostController@edit')->name('post.edit');



