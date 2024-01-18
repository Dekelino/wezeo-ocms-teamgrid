<?php

namespace App\Tasks\Classes\Extend;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->hasMany['tasks'] = ['App\Tasks\Models\Task'];
        });
    }
}
