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
    return view('welcome2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){

	Route::get('/post', 'PostController@index')->name('post.index');
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::post('/post/create', 'PostController@store')->name('post.store');
	Route::get('/post/{post}', 'PostController@show')->name('post.show');
	Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
	Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
	Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
	Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');	
	Route::get('query', 'SearchController@search')->name('query');

	Route::get('/profile', 'ProfileController@index')->name('profile.index');

	Route::get('/category/agriculture', 'CategoryController@agriculture')->name('category.agriculture');
	Route::get('/category/science', 'CategoryController@science')->name('category.science');
	Route::get('/category/social', 'CategoryController@social')->name('category.social');

	Route::get('/admin', 'AdminController@index')->name('admin.panel');
	Route::get('/admin/posttable', 'AdminController@poststable')->name('postadmin.view');
	Route::delete('/admin/{post}/delete', 'AdminController@destroy')->name('postadmin.destroy');
	Route::get('/admin/{post}/edit', 'AdminController@edit')->name('postadmin.edit');
	Route::patch('/admin/{post}/edit', 'AdminController@update')->name('postadmin.update');

	Route::get('/admin/commentstable', 'AdminController@commentstable')->name('commentsadmin.view');
	Route::delete('/admin/{comment}', 'AdminController@commentsdestroy')->name('commentsadmin.destroy');

	Route::get('/admin/userstable', 'AdminController@userstable')->name('usersadmin.view');
	Route::delete('/admin/delete/{user}', 'AdminController@usersdestroy')->name('usersadmin.destroy');

	Route::get('/user/{user}', 'ProfileController@user')->name('profile.user');

});

