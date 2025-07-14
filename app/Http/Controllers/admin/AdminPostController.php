<?php

namespace App\Http\Controllers\admin;

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


class AdminPostController extends BaseController
{
    function dashboard(){
        $latestPosts = Post::latest()->take(6)->get();
        return view('admin.dashboard', compact('latestPosts'));
    }

    public function index()
    {
        $posts = Post::with(['category', 'tags'])
            ->latest()
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    function create(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    function store(StoreRequest $request){
        $this->service->store($request);
        return redirect()->route('admin.posts.index');
    }

    function show(Post $post){
        return view('admin.show', compact('post'));
    }

    function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    function update(Post $post,UpdateRequest $request){
        $this->service->update($request, $post);
        return redirect()->route('admin.posts.show', $post);
    }

    function destroy(Post $post){
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
