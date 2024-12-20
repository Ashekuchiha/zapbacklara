<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/', function () {
//     return ['Laravel ASHIK' => app()->version()];
// });

use App\Http\Controllers\TestController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ServiceorganizationController;
use App\Http\Controllers\ServicesprovidersController;
use App\Http\Controllers\AppusersController;

// Route::apiResource('tests', TestController::class);


// Route::get('services', [ServicesController::class, 'index']);
// Route::get('services/{id}', [ServicesController::class, 'show']);

Route::apiResource('services', ServicesController::class);

// Route::get('states', [StatesController::class, 'index']);
// Route::get('states/{id}', [StatesController::class, 'show']);

Route::get('/states/all', [StatesController::class, 'getAllStates']);
Route::apiResource('states',StatesController::class,);

Route::get('/cities/names', [CitiesController::class, 'getCityNames']);
Route::get('/cities/{StateName}', [CitiesController::class, 'getCitiesByState']);
Route::apiResource('cities',CitiesController::class,);

Route::apiResource('serviceorganizations', ServiceorganizationController::class);
Route::apiResource('servicesproviders', ServicesprovidersController::class);
Route::apiResource('appusers', AppusersController::class);
