<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\RightNowItem;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $rightNowItems = RightNowItem::all();
        $projects = Project::query()
                        ->orderBy('year', 'desc')
                        ->get();
        return view('home', [
            'rightNowItems' => $rightNowItems,
            'projects' => $projects,
        ]);
    }
}
