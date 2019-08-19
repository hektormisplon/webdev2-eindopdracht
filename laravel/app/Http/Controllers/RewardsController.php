<?php

namespace App\Http\Controllers;

use App\Reward;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    public function index()
    {
        $rewards = auth()->user()->rewards;
        return view('rewards.index', compact('rewards'));
    }
}
