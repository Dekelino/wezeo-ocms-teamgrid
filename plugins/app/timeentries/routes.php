<?php

use App\TimeEntries\Http\Controllers\TimeEntryController;
use App\TimeEntries\Http\Middlewares\TimeEntryMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api/v1"], function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('time-entries', [TimeEntryController::class, 'store']);

        Route::middleware([TimeEntryMiddleware::class])->group(function () {

            Route::put('time-entries/{key}', [TimeEntryController::class, 'update']);

            Route::post('time-entries/{key}', [TimeEntryController::class, 'complete']);
        });
    });
});
