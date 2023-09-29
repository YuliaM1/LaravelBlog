<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $popularPosts = Post::orderBy('liked_users_count', 'desc')->get()->take(4);
        $categories = Category::get()->take(5);
        return view('posts.index', compact('posts', 'randomPosts', 'popularPosts', 'categories'));
    }
}
