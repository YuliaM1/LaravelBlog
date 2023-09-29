<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->with('category')->paginate(9);
        return view('categories.post.index', compact('category', 'posts'));
    }
}
