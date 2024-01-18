<?php

namespace App\Tasks\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Tasks\Models\Task;


class TaskMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $taskId = $request->route('key');

        $task = Task::findOrFail($taskId);

        $user = auth()->user();

        if ($task->user_id !== $user->id) {
            abort(403, 'This is not your task, please contact admin user to add you as subscriber');
        }

        return $next($request);
    }
}
