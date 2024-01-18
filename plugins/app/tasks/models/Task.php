<?php namespace App\Tasks\Models;

use Model;
use App\Projects\Models\Project;
use App\TimeEntries\Models\TimeEntry;
use RainLab\User\Models\User;

class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_tasks';

    protected $guarded = ['*'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'project' => [Project::class]
    ];

    public $hasMany = [
        'timeEntries' => Timeentry::class
    ];
}