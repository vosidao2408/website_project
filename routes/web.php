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

Auth::routes(['verify' => true]);

Route::get('/admin','HomeController@index')->middleware('admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::get('home/user/edit/','AuthorUserController@edit');
    Route::put('home/','AuthorUserController@update');
    Route::get('home/user/editpass','AuthorUserController@editPassword');
    Route::put('home/','AuthorUserController@updatePassword');
});

Route::resource('home/posts','AuthorPostController')->middleware('auth','auth.standard');

Route::put('home/posts/{slug}/status','AuthorPostController@status')->middleware('auth');
// Route::put('home/posts/','AuthorPostController@status')->middleware('auth')->name('status');

Route::resource('/admin/users', 'AdminUserController')->middleware('admin');