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

Route::get('home','HomeController@index');

Route::get('/index','SearchController@index')->name('index');
Route::get('/index/search','SearchController@search')->name('search');
Route::get('/index/{slug}','SearchController@show')->name('show');

Route::middleware('auth')->group(function(){
    Route::get('home/user/edit/','AuthorUserController@edit');
    Route::put('home/{id}/edited','AuthorUserController@update');
    Route::get('home/user/editpass','AuthorUserController@editPassword');
    Route::put('home/{id}/pass-edited','AuthorUserController@updatePassword');
    Route::get('home/avatar','AuthorUserController@avatar');
    Route::put('home/avatar','AuthorUserController@avatarUpload');
});

Route::resource('home/posts','AuthorPostController')->middleware('auth','auth.standard');

Route::put('home/posts/{slug}/status','AuthorPostController@status')->middleware('auth');
// Route::put('home/posts/','AuthorPostController@status')->middleware('auth')->name('status');

Route::group(['namespace' => 'Admin'], function () {
    Route::resource('admin/user', 'UserController')->middleware('admin');
    Route::delete('admin/user/delete','UserController@deleteUnverify')->middleware('admin');
    Route::resource('admin/article', 'ArticleController')->middleware('admin');
    Route::resource('admin/district', 'DistrictController')->middleware('admin');
});
