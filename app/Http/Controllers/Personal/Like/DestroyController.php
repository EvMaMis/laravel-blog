<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.likes.index');
    }
}
