<?php

namespace App\Projects\Models;

use Model;
use App\Tasks\Models\Task;
use RainLab\User\Models\User;

class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_projects';

    protected $guarded = ['*'];
    protected $fillable = [];

    public $rules = [];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => [User::class],
    ];

    public $hasMany = [
        'tasks' => [Task::class]
    ];
    
}