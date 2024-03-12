<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DestroyController extends BaseController
{
    public function __invoke(User $post)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete([$post->preview_image, $post->main_image]);
            $post->tags()->detach();
            $post->delete();
            DB::commit();
        } catch(\Exception $exception) {
            dd($exception);
        }
        return redirect()->route('admin.posts.index');
    }
}
