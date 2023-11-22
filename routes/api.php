<?php

use App\Http\Controllers\StudentsController;
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
    Route::get('/', [StudentsController::class, 'index']);
    Route::get('/{student}', [StudentsController::class, 'show']);
    Route::post('/', [StudentsController::class, 'store']);
    Route::patch('/{student}', [StudentsController::class, 'update']);
    Route::delete('/{student}', [StudentsController::class, 'destroy']);
});
