<?php

namespace App\TimeEntries\Http\Controllers;

use Backend\Classes\Controller;
use App\TimeEntries\Models\TimeEntry;
use App\TimeEntries\Http\Resources\TimeEntryResource;
use Illuminate\Http\Request;
use Carbon\Carbon;



class TimeEntryController extends Controller 
{
    public function store(Request $request) 
    {
        $user = auth()->user();
        $timeentry = new TimeEntry();
        $timeentry->task_id = $request->task_id;
        $timeentry->worker_id = $user->id;
        $timeentry->start = Carbon::now('Europe/Bratislava');
        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function complete($key) 
    {
        $timeentry = TimeEntry::findOrFail($key);

        $timeentry->end = Carbon::now('Europe/Bratislava');

        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function update(Request $request,$key) 
    {
        $timeentry = TimeEntry::findOrFail($key);

        $timeentry->start = $request->input('start');
        $timeentry->end= $request->input('end');

        $timeentry->save();

        return TimeEntryResource::make($timeentry);
    }
}