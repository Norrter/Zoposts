<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($request)
    {
        $data = $request->validated();
        Post::create($data);
    }

    public function update($request, $post)
    {
        $data = $request->validated();
        $post->update($data);
    }
}
