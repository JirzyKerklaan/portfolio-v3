<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show($slug): View
    {
        $project = Project::query()
            ->where('slug', $slug)
            ->where('archived', false)
            ->firstOrFail();

        $previousProject = Project::query()
            ->where('archived', false)
            ->where('year', '>', $project->year)
            ->orderBy('year')
            ->first();

        $nextProject = Project::query()
            ->where('archived', false)
            ->where('year', '<', $project->year)
            ->orderBy('year', 'desc')
            ->first();

        return view('projects.show', [
            'project' => $project,
            'previous' => $previousProject,
            'next' => $nextProject,
        ]);
    }
}
