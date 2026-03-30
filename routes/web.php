<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Project;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/sitemap.xml', function () {
    $projects = Project::query()
        ->where('archived', false)
        ->get();

    $sitemap = Sitemap::create()
        ->add(Url::create('/')
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

    foreach ($projects as $project) {
        $sitemap->add(Url::create("/projects/{$project->slug}")
            ->setLastModificationDate($project->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.9));
    }

    return $sitemap->toResponse(request());
});
