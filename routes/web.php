<?php

use App\Http\Controllers\DashboardController;
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

//for prof and admin
Route::group(['middleware' => ['auth','role:professor|admin']],function() {
    Route::get('/dashboard/studentdata','App\Http\Controllers\DashboardController@studentdata')->name
    ('dashboard.studentdata');
    Route::get('/dashboard/studentcreate','App\Http\Controllers\DashboardController@studentcreate')->name
    ('dashboard.studentcreate');
    
    Route::get('/dashboard/studentshow','App\Http\Controllers\DashboardController@studentshow')->name
    ('dashboard.studentshow');
    
    Route::get('/dashboard/studentedit/{id}','App\Http\Controllers\DashboardController@studentedit')->name
    ('dashboard.studentedit');
    Route::post('/dashboard/studentcreate', [DashboardController::class,'storeStudent'])->name
    ('dashboard.storeStudent');
    Route::post('/dashboard/studentcreate', [DashboardController::class,'updateStudent'])->name
    ('dashboard.updateStudent');
    Route::get('/dashboard/studentdelete/{id}', [DashboardController::class,'destroyStudent'])->name
    ('dashboard.destroyStudent');

});

//for student 
Route::group(['middleware' => ['auth','role:student']],function() {
    Route::get('/dashboard/studentdash','App\Http\Controllers\DashboardController@studentdash')->name
    ('dashboard.studentdash');
    Route::get('/dashboard/studentmydata','App\Http\Controllers\DashboardController@studentmydata')->name
    ('dashboard.studentmydata');

});

require __DIR__.'/auth.php';
