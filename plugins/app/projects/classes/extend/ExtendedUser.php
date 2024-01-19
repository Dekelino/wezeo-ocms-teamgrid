<?php

namespace App\Projects\Classes\Extend;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->belongsToMany['projects'] = ['App\Projects\Models\Project'];
        });
    }
}
