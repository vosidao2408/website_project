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

Route::get('/home', 'HomeController@index');

Route::middleware('auth')->group(function(){
    Route::get('home/user/','UserController@index');
    Route::get('home/user/edit','UserController@edit');
    Route::put('home/user/','UserController@update');
});

Route::resource('/admin/users', 'AdminUserController')->middleware('admin');