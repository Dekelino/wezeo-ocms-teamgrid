<?php

namespace App\Projects\Http\Controllers;

use Backend\Classes\Controller;
use App\Projects\Http\Resources\ProjectResource;
use App\Projects\Models\Projects;
use Illuminate\Http\Request;
use App\Projects\Models\Project;


class ProjectController extends Controller
{

    public function getAllProjects()
    {
        $projects = Project::all();
        
        return ProjectResource::collection($projects);
    }

    public function addProject(Request $request)
    {
        $user = auth()->user();
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->customer = $request->customer;
        $project->project_manager = $request->project_manager;
        $project->list = $request->list;
        $project->created_by = $user->name . ' ' . $user->surname;
        $project->save();
        return ProjectResource::make($project);
    }

    public function editProject(Request $request, $project_id)
    {
        $project = Project::findOrFail($project_id); //findOrFail https://docs.octobercms.com/3.x/extend/database/model.html#not-found-exceptions

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->customer = $request->input('customer');
        $project->project_manager = $request->input('project_manager');
        $project->list = $request->input('list');
        $project->save();
    }

    public function toggleIsDoneProject($project_id)
    {
        $project = Project::findOrFail($project_id);

        $project->is_done = $project->is_done ? false : true;

        $project->save();
        return $project->is_done ? "Project {$project->title} is closed" : "Project {$project->title} is still opened";

    }
}
