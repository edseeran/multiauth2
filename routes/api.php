<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return view('auth/login');

});

Route::group(['middleware' => ['auth']],function() {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name
    ('dashboard');

    Route::post('/dashboard','App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']],function() {
    Route::get('/professor/profdata','App\Http\Controllers\ProfessorController@profdata')->name
    ('professor.profdata');

        Route::get('/professor/data','App\Http\Controllers\ProfessorController@profdata')->name
        ('professor.profdata');
    
        Route::get('/professor/profcreate','App\Http\Controllers\ProfessorController@profcreate')->name
        ('professor.profcreate');
        
        
        Route::get('/professor/profedit/{id}','App\Http\Controllers\ProfessorController@profedit')->name
        ('professor.profedit');
    
    
        Route::post('/professor/updateProf', [ProfessorController::class,'updateProf'])->name
        ('professor.updateProf');
    
        Route::post('/professor/storeProf', [ProfessorController::class,'storeProf'])->name
        ('/professor/storeProf');
        
        Route::get('/professor/profdelete/{id}', [ProfessorController::class,'destroyProf'])->name
        ('professor.destroyProf');

        Route::get('professor/searchProf/',[ProfessorController::class,'searchProf'])->name
        ('professor.searchProf');
    

});

//for prof and admin
Route::group(['middleware' => ['auth','role:professor|admin']],function() {
    Route::get('/dashboard/studentdata/','App\Http\Controllers\DashboardController@studentdata')->name
    ('dashboard.studentdata');

    Route::get('/dashboard/studentcreate','App\Http\Controllers\DashboardController@studentcreate')->name
    ('dashboard.studentcreate');
    
    Route::get('/dashboard/studentshow','App\Http\Controllers\DashboardController@studentshow')->name
    ('dashboard.studentshow');
    
    Route::get('/dashboard/studentedit/{id}','App\Http\Controllers\DashboardController@studentedit')->name
    ('dashboard.studentedit');


    Route::post('/dashboard/updateStudent', [DashboardController::class,'updateStudent'])->name
    ('dashboard.updateStudent');

    Route::post('/dashboard/storeStudent', [DashboardController::class,'storeStudent'])->name
    ('/dashboard/storeStudent');
    
    Route::get('/dashboard/studentdelete/{id}', [DashboardController::class,'destroyStudent'])->name
    ('dashboard.destroyStudent');

    Route::get('dashboard/searchStudent/',[DashboardController::class,'searchStudent'])->name
    ('dashboard.searchStudent');

});

//for student 
Route::group(['middleware' => ['auth','role:student']],function() {
    Route::get('/dashboard/studentdash','App\Http\Controllers\DashboardController@studentdash')->name
    ('dashboard.studentdash');
    Route::get('/dashboard/studentmydata','App\Http\Controllers\DashboardController@studentmydata')->name
    ('dashboard.studentmydata');

});

//for prof
Route::group(['middleware' => ['auth']],function() {
    Route::get('/dashboard/profdash','App\Http\Controllers\DashboardController@index')->name
    ('dashboard.profdash');
});

//inbox
Route::group(['middleware' => ['auth']],function() {
    Route::get('/dashboard/inbox','App\Http\Controllers\DashboardController@inbox')->name
    ('dashboard.inbox');
    
});

require __DIR__.'/auth.php';

