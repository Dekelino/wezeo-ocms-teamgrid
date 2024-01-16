<?php

namespace App\Tasks\Extend;

use App\Projects\Models\Project;

class ExtendedProject
{
    public static function extendProject(){
        Project::extend(function($model) {
            $model->hasMany['tasks'] = ['App\Tasks\Models\Task'];
        });
    }
}
