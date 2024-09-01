<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{

    public function store(Request $request)
    {
        // TASK: Add one sentence to save the project to the logged-in user
        //   by $request->project_id and with $request->start_date parameter

        // Get the currently logged-in user
        $user = auth()->user();

        // Find the project by ID
        $project = Project::findOrFail($request->project_id);

        // Associate the project with the user and save it with the start date
        $user->projects()->attach($project->id, ['start_date' => $request->start_date]);


        return 'Success';
    }
}
