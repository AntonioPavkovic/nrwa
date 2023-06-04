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

Route::resource('regions', RegionController::class);
Route::resource('countries', CountryController::class);
Route::resource('locations', LocationController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('jobs', JobController::class);

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});


Route::get('/', function () {
    return view('welcome');
});

Route::put('regions', [RegionController::class, 'update']);
Route::put('countries', [CountryController::class, 'update']);
Route::put('locations', [LocationController::class, 'update']);
Route::put('departments', [DepartmentController::class, 'update']);
Route::put('employees', [EmployeeController::class, 'update']);
Route::put('jobs', [JobController::class, 'update']);