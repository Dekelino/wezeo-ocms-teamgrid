<?php

namespace App\Projects;

use Backend\Facades\Backend;
use System\Classes\PluginBase;
use App\Projects\Classes\Extend\ExtendedUser;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Projects',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf',
            'permissions' => ['app.projects.*'],
            'url'         => Backend::url('app/projects/projects'),
            'order'       => 500,
        ];
    }

    public function boot()
    {
        ExtendedUser::extendUser();
    }

    public function registerPermissions()
    {
        return [
            'app.projects.some_permission' => [
                'tab'   => 'projects',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'projects' => [
                'label'       => 'Projects',
                'url'         => Backend::url('app/projects/projects'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.projects.*'],
                'order'       => 500,
            ],
        ];
    }
}
