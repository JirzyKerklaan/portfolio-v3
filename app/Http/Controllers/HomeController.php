<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\RightNowItem;
use App\Models\Skill;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $skills = Skill::all()->groupBy('column');

        $rightNowItems = RightNowItem::all();
        $projects = Project::query()
                        ->where('archived', false)
                        ->orderBy('order', 'desc')
                        ->get();

        return view('home', [
            'skills' => $skills,
            'rightNowItems' => $rightNowItems,
            'projects' => $projects,
        ]);
    }
}
