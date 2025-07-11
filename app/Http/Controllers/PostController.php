<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\Service;
use Couchbase\UnlockOptions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\BaseController;


class PostController extends BaseController
{
    function index(FilterRequest $request) {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        $categories = Category::all();
        return view('posts', compact('posts', 'categories'));
    }

    function create(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create',compact('categories','tags'));
    }

    function store(StoreRequest $request){
        $this->service->store($request);
        return redirect()->route('post.index');
    }

    function show(Post $post){
        return view('post.show', compact('post'));
    }

    function edit(Post $post){
        $categories = Category::all();
        return view('post.edit', compact('post','categories'));
    }

    function update(Post $post,UpdateRequest $request){
        $this->service->update($request, $post);
        return redirect()->route('post.show', $post);
    }

    function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
}
