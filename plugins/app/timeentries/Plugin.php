<?php

namespace App\TimeEntries;

use Backend\Facades\Backend;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'TimeEntries',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-bomb',
            'url'         => Backend::url('app/timeentries/timeentries'),
            'order'       => 500,
        ];
    }

    public function registerPermissions()
    {
        return [
            'app.timeentries.some_permission' => [
                'tab'   => 'timeentries',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'timeentries' => [
                'label'       => 'Time-entries',
                'url'         => Backend::url('app/timeentries/timeentries'),
                'icon'        => 'icon-bomb',
                'permissions' => ['app.projects.*'],
                'order'       => 500,
            ],
        ];
    }
}
