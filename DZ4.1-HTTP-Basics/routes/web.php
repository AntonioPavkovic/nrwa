<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth.basic')->group(function () {
    Route::resource('regions', RegionController::class);
    Route::put('regions', [RegionController::class, 'update']);

    Route::resource('countries', CountryController::class);
    Route::put('countries', [CountryController::class, 'update']);

    Route::resource('locations', LocationController::class);
    Route::put('locations', [LocationController::class, 'update']);

    Route::resource('departments', DepartmentController::class);
    Route::put('departments', [DepartmentController::class, 'update']);

    Route::resource('employees', EmployeeController::class);
    Route::put('employees', [EmployeeController::class, 'update']);

    Route::resource('jobs', JobController::class);
    Route::put('jobs', [JobController::class, 'update']);
});

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});


Route::get('/', function () {
    return view('welcome');
});
