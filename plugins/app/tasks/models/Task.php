<?php

namespace App\Tasks\Models;

use Model;
use App\Projects\Models\Project;
use App\TimeEntries\Models\TimeEntry;
use RainLab\User\Models\User;

class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_tasks';

    protected $guarded = ['*'];

    protected $fillable = ['name', 'description', 'project_id', 'is_completed', 'project_manager_id', 'planned_start', 'planned_end', 'planned_time',];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'planned_start',
        'planned_end',
    ];

    public $belongsTo = [
        'project_manager' => [User::class],
        'project' => [Project::class]
    ];

    public $hasMany = [
        'timeEntries' => Timeentry::class
    ];
}
