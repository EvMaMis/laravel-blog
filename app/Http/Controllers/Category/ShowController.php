<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(6);
        $randomPosts = Post::get()->random(4);
        $topPosts = Post::orderBy('liked_users_count', 'DESC')->get()->take(5);
        return view('main.posts.index', compact('posts', 'randomPosts', 'topPosts'));
    }
}
