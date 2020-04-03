<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group( function () {
    Route::get('dosens', 'API\DosenController@index');
    Route::resource('users', 'API\UserController');
    Route::get('alumni', 'API\AlumniController@index');
    Route::get('semester', 'API\SemesterController@index');
    Route::get('matakuliah', 'API\MatakuliahController@index');
    Route::get('filemateri', 'API\FilemateriController@index');
    Route::post('aspirasi', 'API\AspirasiController@store');
    Route::get('mahasiswa', 'API\UserController@index');
    Route::get('event', 'API\EventController@index');
    Route::get('logout', 'API\RegisterController@login');
});
