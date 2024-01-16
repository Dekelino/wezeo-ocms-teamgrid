<?php

namespace App\Projects\Models;

use Model;

class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_projects';

    protected $primaryKey = 'project_id'; //defined custom primary key

    protected $guarded = ['*'];
    protected $fillable = [];

    public $rules = [];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User']
    ];
}
