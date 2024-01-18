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
        $key = $request->route('key');

        $project = Project::findOrFail($key);

        $user = auth()->user();

        if ($project->user_id !== $user->id) {
            abort(403, 'This is not your project, please contact admin user to add you as subscriber');
        }

        return $next($request);
    }
}