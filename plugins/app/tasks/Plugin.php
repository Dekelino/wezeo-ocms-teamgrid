<?php namespace App\Tasks;

use App\Projects\Classes\Extend\ExtendedUser;
use Backend\Facades\Backend;
use System\Classes\PluginBase;

/**
 * tasks Plugin Information File
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Tasks',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-dot-circle-o',
            'permissions' => ['app.tasks.*'],
            'url'         => Backend::url('app/tasks/tasks'),
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
            'app.tasks.some_permission' => [
                'tab'   => 'tasks',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'tasks' => [
                'label'       => 'Tasks',
                'url'         => Backend::url('app/tasks/tasks'),
                'icon'        => 'icon-dot-circle-o',
                'permissions' => ['app.tasks.*'],
                'order'       => 500,
            ],
        ];
    }
}
