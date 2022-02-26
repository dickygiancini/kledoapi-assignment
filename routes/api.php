<?php

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

Route::group(['middleware' => ['auth', 'api']], function() {
    Route::get('employees', [App\Http\Controllers\EmployeesController::class, 'index']);
    Route::post('employees', [App\Http\Controllers\EmployeesController::class, 'store']);

    Route::get('overtime', [App\Http\Controllers\OvertimesController::class, 'index']);
    Route::post('overtime', [App\Http\Controllers\OvertimesController::class, 'store']);

    Route::patch('/settings/{key}', [App\Http\Controllers\OvertimesController::class, 'update']);

    Route::get('/overtime-pays/calculate', [App\Http\Controllers\OvertimeCalculationController::class, 'index']);
});
