<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function store($data)
    {
        return 'store method for users';
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
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
            else
                $post->tags()->detach();
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
