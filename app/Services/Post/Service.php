<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\PostTag;

class Service
{
    public function store($request)
    {
        $data = $request->validated();

        // Добавляем проверку на существование ключа 'tags'
        $tags = $data['tags'] ?? [];
        unset($data['tags']);
        $post = Post::create($data);
        // Более надежная проверка на массив
        if (is_array($tags) && !empty($tags)) {
            $post->tags()->attach($tags);
        }

        return $post;
    }

    public function update($request, $post)
    {
        $data = $request->validated();
        $tags = $data['tags'] ?? [];
        unset($data['tags']);
        $post->update($data);

        // Всегда синхронизируем, даже с пустым массивом
        $post->tags()->sync($tags);

        return $post;
    }
}
