<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ProjectPledged;
use App\Project;
use App\Transaction;

class ProjectPledgeController extends Controller
{
    public function pledge(Project $project)
    {
        $user = auth()->user();
        if ($project->owner->id == $user->id) {
            return redirect('discover/details/' . $project->id)->with('warning', 'The goal is to find other people to fund your project.');
        }

        $transaction = Transaction::create([
            'credit_amount' => request('pledged'),
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ]);

        $adminFee = request('pledged') * .1;
        $admin = \App\User::where('role', 'admin')->first();
        $admin->update(['credit_amount' => $admin->credit_amount + $adminFee]);

        $pledged = request('pledged') - $adminFee;
        $user_balance = $user->credit_amount;
        if ($user_balance < request('pledged')) {
            return redirect('discover/details/' . $project->id)->with('error', 'You don\'t  have enough creunits for that. ');
        }
        $user->update(['credit_amount' => $user->credit_amount - request('pledged')]);
        $project->update(['pledged' => $project->pledged + $pledged]);

        // event(new ProjectPledged($transaction));
        return redirect('discover/details/' . $project->id)->with('message', 'You pledged ' . $pledged . ' creunits');
    }
}
