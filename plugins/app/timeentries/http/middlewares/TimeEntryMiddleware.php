<?php 

namespace App\TimeEntries\Http\Middlewares;

use App\TimeEntries\Models\TimeEntry; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeEntryMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $timeEntryId = $request->route('entry_id');

        $timeEntryId = TimeEntry::findOrFail($timeEntryId);

        $user = auth()->user();

        if ($timeEntryId->user_id !== $user->id) {
            abort(403, 'This is not your time entry, please contact admin user to add you as subscriber .');
        }

        return $next($request);
    }
}