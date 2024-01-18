<?php

namespace App\Projects;

use Backend;
use System\Classes\PluginBase;
use App\Projects\Classes\Extend\ExtendedUser;

/**
 * projects Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'projects',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf'
        ];
    }
    public function boot()
    {
        ExtendedUser::extendUser();
    }
}
