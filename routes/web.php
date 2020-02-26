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
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::resource('users', 'UserController');
    Route::get('users/search', 'UserController@search')->name('users.search');
});

