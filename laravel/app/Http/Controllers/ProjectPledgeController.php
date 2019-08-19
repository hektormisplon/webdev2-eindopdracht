<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Transaction;

class ProjectPledgeController extends Controller
{
    public function pledge(Project $project)
    {
        Transaction::create([
            'credit_amount' => request('pledged'),
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ]);
        $project->update(['pledged' => $project->pledged + request('pledged')]);
        return redirect('discover/details/' . $project->id)->with('message', 'You pledged ' . request('pledged') . ' creunits');
    }
}
