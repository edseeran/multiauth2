<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::group(['middleware' => ['auth']],function() {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']],function() {
    Route::get('/dashboard/profdata','App\Http\Controllers\DashboardController@profdata')->name
    ('dashboard.profdata');

});

//for prof
Route::group(['middleware' => ['role:professor|admin']],function() {
    Route::get('/dashboard/studentdata','App\Http\Controllers\DashboardController@studentdata')->name
    ('dashboard.studentdata');
});

require __DIR__.'/auth.php';
