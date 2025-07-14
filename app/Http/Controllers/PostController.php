<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class PostController extends BaseController
{
    function index(FilterRequest $request) {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(12);
        $categories = Category::all();
        return view('posts', compact('posts', 'categories'));
    }

    function show(Post $post){
        return view('show', compact('post'));
    }
}
