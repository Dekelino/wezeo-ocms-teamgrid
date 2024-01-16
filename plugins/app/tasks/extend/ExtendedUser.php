<?php

namespace App\Tasks\Extend;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->hasMany['tasks'] = ['App\Tasks\Models\Task'];
        });
    }
}
