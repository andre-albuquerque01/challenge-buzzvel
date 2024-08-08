<?php

use App\Http\Controllers\Api\HolidayPlanController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('users', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('holiday', HolidayPlanController::class);
        Route::get('holidays/pdf', [HolidayPlanController::class, 'getAllReportPdf']);
        Route::get('holidays/pdf/{id}', [HolidayPlanController::class, 'getOneReportPdf']);
        Route::put('users', [UserController::class, 'update']);
        Route::delete('users', [UserController::class, 'destroy']);
        Route::get('users', [UserController::class, 'show']);
        Route::post('logout', [UserController::class, 'logout']);
    });
});
