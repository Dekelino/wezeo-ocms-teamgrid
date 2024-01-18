<?php

namespace App\Projects\Http\Controllers;

use Backend\Classes\Controller;
use App\Projects\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use App\Projects\Models\Project;


class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();

        return ProjectResource::collection($projects);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $project = new Project();
        $project->id = $request->id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->customer = $request->customer;
        $project->list = $request->list;
        $project->user_id = $user->id;
        $project->save();
        return new ProjectResource($project);
    }

    public function update(Request $request, $key)
    {
        $project = Project::findOrFail($key); //findOrFail https://docs.octobercms.com/3.x/extend/database/model.html#not-found-exceptions


        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->customer = $request->input('customer');
        $project->list = $request->input('list');
        $project->save();
        return new ProjectResource($project);
    }

    public function complete($key)
    {
        $project = Project::findOrFail($key);

        $project->is_done = $project->is_done ? false : true;

        $project->save();
        return new ProjectResource($project);
    }
}
