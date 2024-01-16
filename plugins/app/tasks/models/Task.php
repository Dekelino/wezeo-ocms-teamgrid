<?php namespace App\Tasks\Models;

use Model;


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
        'user' => ['RainLab\User\Models\User'],
        'project' => ['App\Projects\Models\Project', 'project_id']
    ];
}
