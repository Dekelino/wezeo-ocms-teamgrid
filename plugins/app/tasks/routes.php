<?php

use App\Tasks\Http\Controllers\TaskController;
use App\Tasks\Http\Middleware\TaskMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {
    Route::get('all-tasks', [TaskController::class, 'getAllTasks']);
    Route::middleware(['auth'])->group(function () {
        Route::post('{project_id}/add-task', [TaskController::class, 'addTask']);
        Route::get('projects/{project_id}/tasks', [TaskController::class, 'getTasksForProject']);


        Route::middleware([TaskMiddleware::class])->group(function () {
            Route::put('edit-task/{task_id}', [TaskController::class, 'editTask']);
            Route::put('toggle-task-status/{task_id}', [TaskController::class, 'toggleIsDoneTask']);
        });
    });
});
