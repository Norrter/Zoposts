<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Tag;

class AdminTagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        Tag::create($validated);
        return redirect()->route('admin.tag.index');
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, UpdateRequest $request)
    {
        $validated = $request->validated();
        $tag->update($validated);
        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
