<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if(isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['preview_image']))
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if(isset($data['main_image']))
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post->update($data);
            if(isset($tagIds))
                $post->tags()->sync($tagIds);
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(404);
        }
        return redirect()->route('admin.posts.show', $post);
    }
}
