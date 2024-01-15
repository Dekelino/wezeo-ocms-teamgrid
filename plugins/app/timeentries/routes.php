<?php

use App\TimeEntries\Http\Controllers\TimeEntryController;
use App\TimeEntries\Http\Middlewares\TimeEntryMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "api"], function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('time-entries/start-tracking', [TimeEntryController::class, 'startTracking']);

        Route::middleware([TimeEntryMiddleware::class])->group(function () {

            Route::put('time-entries/edit-tracking/{entry_id}', [TimeEntryController::class, 'editTracking']);

            Route::post('time-entries/end-tracking/{entry_id}', [TimeEntryController::class, 'endTracking']);
        });
    });
});
