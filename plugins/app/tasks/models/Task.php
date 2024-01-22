<?php

namespace App\Tasks\Models;

use Model;
use App\Projects\Models\Project;
use App\TimeEntries\Models\TimeEntry;
use RainLab\User\Models\User;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_tasks';

    protected $guarded = ['*'];

    protected $fillable = ['name', 'description', 'project_id', 'is_completed', 'user_id', 'planned_start', 'planned_end', 'planned_time',];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'planned_start',
        'planned_end',
    ];

    public $belongsTo = [
        'user' => [User::class],
        'project' => [Project::class]
    ];

    public $hasMany = [
        'timeEntries' => Timeentry::class
    ];

    public function getTotalTrackedTimeAttribute()
    {

        $timeEntries = TimeEntry::where('task_id', $this->id)->get();

        $totalDuration = 0;

        foreach($timeEntries as $timeEntry){
            $totalDuration += Carbon::parse($timeEntry->start)->diffInMinutes(Carbon::parse($timeEntry->end)); //+= count, "+" overwrite
        }

        $hours = floor($totalDuration / 60);
        $minutes = $totalDuration % 60;

        return sprintf('%02d:%02d', $hours, $minutes);
    }
}
