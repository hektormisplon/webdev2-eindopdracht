<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $projects = \App\Project::all();
        // $averageProjectGoal = $projects->avg('goal');
        $sumProjectGoal = $projects->sum('goal');
        $sumProjectPledged = $projects->sum('pledged');
        $totalProjects = $projects->count();

        $projectStatistics = [
            'numberOfProjects' => $totalProjects,
            // 'averageGoal' => $projects->avg('goal'),
            'totalGoal' => $sumProjectGoal,
            'totalPledged' => $sumProjectPledged,
            'totalRemaining' => $sumProjectGoal - $sumProjectPledged
        ];
        return view('welcome', compact('projectStatistics'));
    }

    public function about()
    {
        return view('base', ['page' => Page::where('title', 'about')->first()]);
    }

    public function contact()
    {
        return view('base', ['page' => Page::where('title', 'contact')->first()]);
    }

    public function privacyPolicy()
    {
        return view('base', ['page' => Page::where('title', 'privacy policy')->first()]);
    }

    public function terms()
    {
        return view('base', ['page' => Page::where('path', 'terms-conditions')->first()]);
    }
}
