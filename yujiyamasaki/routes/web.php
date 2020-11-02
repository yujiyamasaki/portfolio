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

// Route::get('/', function () {
//     return view('welcome');
// });

//top
Route::get('/', 'Index\IndexController@index')->name('index');

//about
Route::get('/about', function () {
    return view('about');
})->name('about');

//blog
Route::get('/blog', 'Blog\BlogController@index')->name('blog.index');
Route::get('/blog/create', 'Blog\BlogController@create')->name('blog.create')->middleware('auth');
Route::post('/blog/store', 'Blog\BlogController@store')->name('blog.store')->middleware('auth');
Route::get('/blog/detail', 'Blog\BlogController@show')->name('blog.detail');
Route::get('/blog/edit', 'Blog\BlogController@edit')->name('blog.edit')->middleware('auth');
Route::post('/blog/update', 'Blog\BlogController@update')->name('blog.update')->middleware('auth');
Route::get('/blog/delete', 'Blog\BlogController@destroy')->name('blog.delete')->middleware('auth');

//contact
Route::get('/contact', 'Contact\ContactController@show')->name('contact.show');
Route::post('/contact', 'Contact\ContactController@post')->name('contact.post');
Route::get('/contact/confirm', 'Contact\ContactController@confirm')->name('contact.confirm');
Route::post('/contact/confirm', 'Contact\ContactController@send')->name('contact.send');
Route::get('/contact/thanks', 'Contact\ContactController@complete')->name('contact.complete');

//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
