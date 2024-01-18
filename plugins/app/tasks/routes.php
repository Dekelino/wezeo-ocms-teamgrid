<?php

use App\Tasks\Http\Controllers\TaskController;
use App\Tasks\Http\Middleware\TaskMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api/v1"], function () {
    Route::get('tasks', [TaskController::class, 'index']);
    Route::middleware(['auth'])->group(function () {
        Route::post('tasks/{key}', [TaskController::class, 'store']);
        Route::get('tasks-project/{key}', [TaskController::class, 'indexProject']);


        Route::middleware([TaskMiddleware::class])->group(function () {
            Route::put('tasks/{key}', [TaskController::class, 'update']);
            Route::put('tasks-complete/{key}', [TaskController::class, 'complete']);
        });
    });
});
