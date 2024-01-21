<?php

use App\Projects\Http\Controllers\CoworkerController;
use App\Projects\Http\Controllers\ProjectController;
use App\Projects\Http\Middlewares\ProjectMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api/v1"], function () {
    Route::get('projects', [ProjectController::class, 'index']);


    Route::middleware(['auth'])->group(function () {
        Route::post('projects', [ProjectController::class, 'store']);
        Route::get('projects-coworkers', [CoworkerController::class, 'index']);


        Route::middleware([ProjectMiddleware::class])->group(function () {
            Route::put('project/{key}', [ProjectController::class, 'update']);
            Route::put('project-complete/{key}', [ProjectController::class, 'complete']);
        });
    });
});
