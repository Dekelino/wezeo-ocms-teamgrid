<?php

namespace App\Tasks\Http\Controllers;

use Backend\Classes\Controller;
use App\Tasks\Http\Resources\TaskResource;
use App\Tasks\Models\Task;
use Illuminate\Http\Request;
use App\Projects\Models\Project;


class TaskController extends Controller
{

    public function getAllTasks()
    {
        $tasks = Task::all();
        
        return TaskResource::collection($tasks);
    }

    public function addTask(Request $request)
    {
        $user = auth()->user();
        $task = new Task();
        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->subscribers_user_id = $request->subscribers_user_id;
        $task->is_completed = $request->is_completed;
        $task->created_by = $user->id;
        $task->planned_start = $request->planned_start;
        $task->planned_end = $request->planned_end;
        $task->planned_time = $request->planned_time;
        $task->save();
        return TaskResource::make($task);
    }

    public function editTask(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id); //findOrFail https://docs.octobercms.com/3.x/extend/database/model.html#not-found-exceptions

        $task->task_name = $request->input('task_name');
        $task->description = $request->input('description');
        $task->subscribers_user_id = $request->input('subscribers_user_id');
        $task->is_completed = $request->input('is_completed');
        $task->planned_start = $request->input('planned_start');
        $task->planned_end = $request->input('planned_end');
        $task->planned_time = $request->input('planned_time');
        $task->save();

        return "Task {$task->task_name} updated successfully";
    }

    public function toggleIsDoneTask($task_id)
    {
        $task = Task::findOrFail($task_id);

        $task->is_completed = $task->is_completed ? false : true;

        $task->save();
        return $task->is_completed ? "Task {$task->title} is completed" : "Task {$task->title} is still opened";

    }
    public function getTasksForProject($project_id)
    {
        $project = Project::findOrFail($project_id);
        $tasks = $project->tasks;

        return $tasks;

    }
}
