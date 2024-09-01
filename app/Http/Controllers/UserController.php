<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve users with at least one project
        $users = User::whereHas('projects')->get();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        //users with at least one project
        if ($user->projects()->exists()) {
            $user = $user->projects();
            return view('users.show', compact('user'));
        }
    }
}
