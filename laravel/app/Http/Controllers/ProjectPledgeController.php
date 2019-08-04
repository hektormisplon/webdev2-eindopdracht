<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pledge;
use App\Project;

class ProjectPledgeController extends Controller
{
    public function index() 
    {
        $pledges = Pledge::all();
        return view('pledges.index', compact('pledges'));
    }

    public function create() {
        $pledged = Pledge::create(request()->validate([
            'pledged' => ['required'],
            'amount' => ['required']
        ]));
    }

    public function show(Pledge $pledge) {
        return view('pledges.show', compact('pledge'));
    }

    public function store(Project $project) {
        $project->addPledge(request('amount'));
    }

    public function update(Pledge $pledge) {
        $pledge->sponsor();
        return back();
    }
}
