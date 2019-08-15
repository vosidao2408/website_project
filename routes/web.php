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

Route::get('/index','SearchController@index')->name('index');
Route::get('/index/search','SearchController@search')->name('search');
Route::get('/index/{slug}','SearchController@show')->name('show');

Route::middleware('auth')->group(function(){
    Route::get('home/user/edit/','AuthorUserController@edit');
    Route::patch('home/{id}/edited','AuthorUserController@update');
    Route::get('home/user/editpass','AuthorUserController@editPassword');
    Route::put('home/{id}/pass-edited','AuthorUserController@updatePassword');
});

Route::resource('home/posts','AuthorPostController')->middleware('auth','auth.standard');

Route::put('home/posts/{slug}/status','AuthorPostController@status')->middleware('auth');
// Route::put('home/posts/','AuthorPostController@status')->middleware('auth')->name('status');

Route::resource('/admin/users', 'AdminUserController')->middleware('admin');
Route::group(['namespace' => 'Admin'], function () {
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/article', 'ArticleController');
    Route::resource('admin/district', 'DistrictController');
});
