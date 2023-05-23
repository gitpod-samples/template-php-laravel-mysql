<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileController extends Controller
{
    public function index(User $user)
    {
        if ($user) {
            return inertia('Profile/ProfileView', compact('user'));
        }
        if (request()->user()) {
            return redirect()->route('profile.index', request()->user()->username);
        }

        abort(404);
    }
}
