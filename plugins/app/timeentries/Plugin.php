<?php namespace App\TimeEntries;

use Backend;
use System\Classes\PluginBase;
use App\Extend\ExtendedUser;


/**
 * timeEntries Plugin Information File
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
            'name'        => 'timeEntries',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        ExtendedUser::extend(function ($model) {
            $model->implement[] = 'RainLab.User.Behaviors.UserPreferencesModel';
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'App\TimeEntries\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'app.timeentries.some_permission' => [
                'tab' => 'timeEntries',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'timeentries' => [
                'label'       => 'timeEntries',
                'url'         => Backend::url('app/timeentries/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.timeentries.*'],
                'order'       => 500,
            ],
        ];
    }
}
