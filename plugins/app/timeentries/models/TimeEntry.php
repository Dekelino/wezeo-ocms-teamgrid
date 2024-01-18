<?php

namespace App\Timeentries\Models;

use Model;
use RainLab\User\Models\User;
use App\Tasks\Models\Task;

/**
 * timeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_timeentries';

    protected $guarded = ['*'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'task' => [Task::class, 'user' => User::class]
    ];
}
