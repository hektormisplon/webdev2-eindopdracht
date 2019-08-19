<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function index()
    {
        // $users = User::all()->except(auth()->user()->id)->paginate(5);
        $users = User::where('id', '!=', auth()->id())->paginate(6);
        return view('account.index', compact("users"));
    }
}
