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
    protected $fillable = ['name', 'description', 'is_done', 'project_manager_id', 'customer_id', 'coworkers', 'list'];

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

    public function getCoworkersOptions() //dynamic options
    {
        // getting all users
        $coworkers = \RainLab\User\Models\User::all();
        // returing array filled with id & names of users
        return $coworkers->pluck('name', 'id')->all();  //https://docs.octobercms.com/2.x/services/collections.html#pluck - pluck
    }

    public function getCoworkersCountAttribute()
    {
        return $this->coworkers()->count();
    }
}
