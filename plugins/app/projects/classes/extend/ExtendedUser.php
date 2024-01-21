<?php

namespace App\Projects\Classes\Extend;

use Illuminate\Database\Eloquent\Model;
use RainLab\User\Models\User as RainLabUser;

class ExtendedUser extends Model
{
    public static function extendUser(){
        RainLabUser::extend(function($model) {
            $model->belongsToMany['coworkedProjects'] = ['App\Projects\Models\Project'];
        });
    }
}
