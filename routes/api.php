<?php

use App\Notifications\event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use NotificationChannels\Fcm\Resources\Notification;

use function GuzzleHttp\json_encode;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('notif', function () {
//     $user = User::find(1)->notify(new event);
//     // $user->notify(new event);
//     return response()->json($user, 200);
// });

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group( function () {
    Route::get('dosens', 'API\DosenController@index');
    Route::get('profile', 'API\UserController@show');
    // Route::put('profile/update', 'API\UserController@update');
    Route::patch('profile/update', 'API\UserController@update');
    Route::get('alumni', 'API\AlumniController@index');
    Route::get('semester', 'API\SemesterController@index');
    Route::get('matakuliah', 'API\MatakuliahController@index');
    Route::get('filemateri', 'API\FilemateriController@index');
    Route::post('aspirasi', 'API\AspirasiController@store');
    Route::get('mahasiswa', 'API\MahasiswaController@index');
    Route::get('event', 'API\EventController@index');
    Route::get('jurnal', 'API\JournalController@index');
    Route::get('logout', 'API\RegisterController@login');
});
