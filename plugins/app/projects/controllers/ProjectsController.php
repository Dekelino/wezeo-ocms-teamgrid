<?php namespace App\Projects\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use App\Projects\Models\Project;
use Flash;

/**
 * Projects-Controller Back-end Controller
 */
class ProjectsController extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('App.Projects', 'projects', 'projects-controller');
    }
    public function createProject()
    {
        $projectModel = new Project();
        $projectModel->name = 'New Project'; 

        event('app.projects.create', $projectModel);

        $projectModel->save();


        Flash::success('Project created successfully');
    }
}
