<?php

namespace App\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Backend\Classes\Controller;
use App\Projects\Models\Project;
use App\Projects\Http\Resources\ProjectResource;

class CoworkerController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $projects = $user->coworkedProjects;

        return ProjectResource::collection($projects);
    }
}
