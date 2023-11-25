<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/students'], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/{student}', [StudentController::class, 'show']);
    Route::post('/', [StudentController::class, 'store']);
    Route::patch('/{student}', [StudentController::class, 'update']);
    Route::delete('/{student}', [StudentController::class, 'destroy']);
});
Route::group(['prefix' => '/groups'], function () {
    Route::get('/', [GroupController::class, 'index']);
    Route::get('/{group}/students', [GroupController::class, 'showGroupAndGetStudents']);
    Route::get('/{group}/lectures', [GroupController::class, 'showGroupAndGetLectures']);
    Route::post('/', [GroupController::class, 'store']);
    Route::put('/{group}/schedule', [GroupController::class, 'updateSchedule']);
    Route::patch('/{group}', [GroupController::class, 'update']);
    Route::delete('/{group}', [GroupController::class, 'destroy']);
});
Route::group(['prefix' => '/lectures'], function (){
    Route::get('/', [LectureController::class, 'index']);
    Route::get('/{lecture}', [LectureController::class, 'show']);
    Route::post('/', [LectureController::class, 'store']);
    Route::patch('/{lecture}', [LectureController::class, 'update']);
    Route::delete('/{lecture}', [LectureController::class, 'destroy']);
});
