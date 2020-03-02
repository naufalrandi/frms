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

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('cobafile', 'filemateri.index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::resource('users', 'UserController');
    Route::resource('dosens', 'DosenController');
    Route::resource('alumni', 'AlumniController');
    Route::resource('aspirasi', 'AspirasiController');
    Route::resource('semester', 'SemesterController');
    Route::resource('matakuliah', 'MatakuliahController');
    Route::resource('filemateri', 'FilemateriController', [
        'only' => ['index', 'create', 'store','destroy']
    ]);
    Route::resource('event', 'EventController');
    Route::get('users-list', 'UserController@usersList');

    // Events
    Route::resource('event', 'EventController');

});

