<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $relatedPosts = Post::with('category')
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $comments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'relatedPosts', 'comments'));
    }
}
