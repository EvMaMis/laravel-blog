<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['category_count'] = Category::all()->count();
        $data['post_count'] = Post::all()->count();
        $data['user_count'] = User::all()->count();
        $data['tag_count'] = Tag::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
