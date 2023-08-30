<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

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

Route::prefix('course')->group(function () {
    Route::get('/', [CourseController::class, 'list']);
    Route::post('/', [CourseController::class, 'create']);
    Route::put('{courseID}', [CourseController::class, 'update']);
});

Route::prefix('lecturer')->group(function () {
    Route::get('/', [UserController::class, 'listLecturer']);
    Route::post('/', [UserController::class, 'createLecturer']);
});
