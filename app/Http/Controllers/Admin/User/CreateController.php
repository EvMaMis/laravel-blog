<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.users.create', compact('categories', 'tags'));
    }
}
