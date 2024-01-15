<?php 

namespace App\Projects\Http\Middlewares;

use App\Projects\Models\Project; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $projectId = $request->route('project_id');

        $project = Project::findOrFail($projectId);

        $user = auth()->user();

        if ($project->created_by !== $user->id) {
            abort(403, 'This is not your project, please contact admin user to add you as subscriber');
        }

        return $next($request);
    }
}