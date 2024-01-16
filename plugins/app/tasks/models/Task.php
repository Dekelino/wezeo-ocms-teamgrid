<?php namespace App\Tasks\Models;

use Model;
use App\Projects\Models\Project;
use App\TimeEntries\Models\TimeEntry;
use RainLab\User\Models\User;

class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_tasks';

    protected $primaryKey = 'task_id'; //defined custom primary key

    protected $guarded = ['*'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'project' => [Project::class,'key' => 'project_id','otherKey' => 'project_id' ]
    ];

    public $hasMany = [
        'timeEntries' => Timeentry::class
    ];
}