<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tagIds = $this->setTags($data);
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);
            if (!empty($tagIds))
                $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            $tagIds = $this->setTags($data);
            unset($data['tag_ids']);
            $data = $this->updateImages($data, $post);

            $post->update($data);

            if(!empty($tagIds))
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

    public function delete($post) {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete([$post->preview_image, $post->main_image]);
            $post->tags()->detach();
            $post->delete();
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }

    private function setTags($data) {
        $tagIds = [];
        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        return $tagIds;
    }

    private function updateImages($data, $post) {
        if(isset($data['preview_image']))
        {
            Storage::disk('public')->delete($post->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        if(isset($data['main_image'])){
            Storage::disk('public')->delete($post->main_image);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }
        return $data;
    }

}
