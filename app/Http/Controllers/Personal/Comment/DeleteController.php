<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        auth()->user()->comments()->delete($comment->id);
        return redirect()->route('personal.comments.index');
    }
}
