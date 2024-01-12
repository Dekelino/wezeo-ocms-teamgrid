<?php

use App\Projects\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('all-projects', [ProjectController::class, 'getAllProjects']);
        Route::post('add-project', [ProjectController::class, 'addProject']);
        Route::put('edit-project/{project_id}', [ProjectController::class, 'editProject']);
        Route::put('toggle-status/{project_id}', [ProjectController::class, 'toggleIsDoneProject']);

    });
});