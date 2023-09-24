<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->role_name = User::getRoles()[$user->role];
        }
        return view('admin.users.index', compact('users'));
    }
}
