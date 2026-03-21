<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show($slug): View
    {
        $project = Project::query()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('projects.show', [
            'project' => $project,
        ]);
    }
}
