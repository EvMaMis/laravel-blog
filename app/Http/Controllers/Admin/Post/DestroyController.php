<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete([$post->preview_image, $post->main_image]);
            $post->delete();
            DB::commit();
        } catch(\Exception $exception) {
            dd($exception);
        }
        return redirect()->route('admin.posts.index');
    }
}
