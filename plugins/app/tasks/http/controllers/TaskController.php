<?php

namespace App\Tasks\Http\Controllers;

use Backend\Classes\Controller;
use App\Tasks\Http\Resources\TaskResource;
use App\Tasks\Models\Task;
use Illuminate\Http\Request;
use App\Projects\Models\Project;


class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        
        return TaskResource::collection($tasks);
    }

    public function store(Request $request,$key)
    {
        $user = auth()->user();
        $task = new Task();
        $task->id= $request->id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $key;
        $task->is_completed = $request->is_completed;
        $task->project_manager_id = $user->id;
        $task->planned_start = $request->planned_start;
        $task->planned_end = $request->planned_end;
        $task->planned_time = $request->planned_time;
        $task->save();
        return TaskResource::make($task);
    }

    public function update(Request $request, $key)
    {
        $user = auth()->user();
        $task = Task::findOrFail($key); //findOrFail https://docs.octobercms.com/3.x/extend/database/model.html#not-found-exceptions

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->is_completed = $request->input('is_completed');
        $task->planned_start = $request->input('planned_start');
        $task->planned_end = $request->input('planned_end');
        $task->planned_time = $request->input('planned_time');
        $task->save();

        return "Task {$task->task_name} updated successfully";
    }

    public function complete($key)
    {   
        $user = auth()->user();
        $task = Task::findOrFail($key);

        $task->is_completed = $task->is_completed ? false : true;

        $task->save();
        return $task->is_completed ? "Task {$task->title} is completed" : "Task {$task->title} is still opened";

    }
    public function indexProject($key)
    {
        $project = Project::findOrFail($key);
        $tasks = $project->tasks;
        return $tasks;

    }
}
