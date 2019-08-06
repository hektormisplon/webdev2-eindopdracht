<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user', $user));
    }

    public function update()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            // 'email' => ['unique:users', 'required', 'min:3'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $avatarName = $user->id . '_avatar' . '.' . request()->avatar->getClientOriginalExtension();
        request()->avatar->storeAs('avatars', $avatarName);
        $user->update(['avatar' => $avatarName]);
        return redirect('/home')->with('success', 'Your profile has been updated.');
    }
}
