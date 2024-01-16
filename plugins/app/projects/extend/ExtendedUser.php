<?php

namespace App\Projects\Extend;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->hasMany['projects'] = ['App\Projects\Models\Project'];
        });
    }
}
