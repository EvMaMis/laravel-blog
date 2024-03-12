<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['count-likes'] = auth()->user()->likedPosts->count();
        $data['count-comments'] = auth()->user()->comments->count();
        return view('personal.main.index', compact('data'));
    }
}
