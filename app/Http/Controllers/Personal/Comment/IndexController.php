<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments()->with('post')->get();
        return view('personal.comments.index', compact('comments'));
    }
}
