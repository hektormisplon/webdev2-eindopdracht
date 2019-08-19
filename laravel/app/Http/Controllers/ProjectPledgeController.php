<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectPledgeController extends Controller
{
    public function pledge(Project $project)
    {
        $project->update(['pledged' => $project->pledged + request('pledged')]);
        return redirect('discover/details/' . $project->id)->with('message', 'You pledged ' . request('pledged') . ' creunits');
    }
}
