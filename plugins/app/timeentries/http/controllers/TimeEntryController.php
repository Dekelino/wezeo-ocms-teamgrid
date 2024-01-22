<?php

namespace App\TimeEntries\Http\Controllers;

use Backend\Classes\Controller;
use App\TimeEntries\Models\TimeEntry;
use App\TimeEntries\Http\Resources\TimeEntryResource;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Config;


class TimeEntryController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $timeentry = new TimeEntry();
        $timeentry->task_id = $request->task_id;
        $timeentry->user_id = $user->id;
        $timezone = Config::get('app.timezone');
        $timeentry->start = Carbon::now($timezone);
        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function complete($key)
    {
        $timeentry = TimeEntry::findOrFail($key);
        $timezone = Config::get('app.timezone');
        $timeentry->end = Carbon::now($timezone);
        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }
}
