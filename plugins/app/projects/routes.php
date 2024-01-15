<?php

use App\Projects\Http\Controllers\ProjectController;
use App\Projects\Http\Middlewares\ProjectMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {
    Route::get('all-projects', [ProjectController::class, 'getAllProjects']);

    Route::middleware(['auth'])->group(function () {
        Route::post('add-project', [ProjectController::class, 'addProject']);

        Route::middleware([ProjectMiddleware::class])->group(function () {
            Route::put('edit-project/{project_id}', [ProjectController::class, 'editProject']);
            Route::put('toggle-project-status/{project_id}', [ProjectController::class, 'toggleIsDoneProject']);
        });
    });
});
