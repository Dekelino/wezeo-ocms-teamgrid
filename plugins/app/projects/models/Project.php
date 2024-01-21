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
        'project_manager' => [User::class], // project manager, customer
        'customer' => [User::class]
    ];

    public $hasMany = [
        'tasks' => [Task::class]
    ];

    public $belongsToMany = [
        'coworkers' => ['RainLab\User\Models\User', 'table' => 'app_project_user', 'key' => 'project_id', 'otherKey' => 'user_id'] // v tabulke vypisat iba count 
    ];


    // Event to update coworkers count before saving
    public function beforeSave()
    {
        $this->attributes['coworkers'] = $this->coworkers->count();;
    }
}
