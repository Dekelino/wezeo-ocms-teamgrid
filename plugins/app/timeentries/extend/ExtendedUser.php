<?php

namespace App\Timeentries\Extend;

use App\Tasks\Models\Task;

class ExtendedUser
{
    public static function extendTask(){
        Task::extend(function($model) {
            $model->hasMany['timeEntries'] = ['App\TimeEntries\Models\TimeEntry'];
        });
    }
}
