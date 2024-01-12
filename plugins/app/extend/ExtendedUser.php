<?php

namespace App\Extend;

use RainLab\User\Models\User as RainLabUser;

class ExtendedUser extends RainLabUser
{
    public $hasMany = [
        'projects' => ['App\Projects\Models\Projects']
    ];
}
