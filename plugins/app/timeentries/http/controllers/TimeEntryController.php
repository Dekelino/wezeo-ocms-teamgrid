<?php

namespace App\TimeEntries\Http\Controllers;

use Backend\Classes\Controller;
use App\TimeEntries\Models\TimeEntry;
use App\TimeEntries\Http\Resources\TimeEntryResource;
use Illuminate\Http\Request;
use Carbon\Carbon;



class TimeEntryController extends Controller 
{
    public function store() 
    {
        $user = auth()->user();
        $timeentry = new TimeEntry();
        $timeentry->user_id = $user->id;
        $timeentry->start_time = Carbon::now('Europe/Bratislava');
        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function complete($key) 
    {
        $timeentry = TimeEntry::findOrFail($key);

        $timeentry->end_time = Carbon::now('Europe/Bratislava');

        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function update(Request $request,$key) 
    {
        $timeentry = TimeEntry::findOrFail($key);

        $timeentry->start_time = $request->input('start_time');
        $timeentry->end_time = $request->input('end_time');

        $timeentry->save();

        return TimeEntryResource::make($timeentry);
    }
}