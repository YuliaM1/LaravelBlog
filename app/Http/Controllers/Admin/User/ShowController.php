<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $user->role_name = User::getRoles()[$user->role];
        return view('admin.users.show', compact('user'));
    }
}
