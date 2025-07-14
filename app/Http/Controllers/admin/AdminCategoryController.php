<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class AdminCategoryController
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);

        return redirect()->route('admin.category.index')
            ->with('success', 'Категория успешно создана');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $validated = $request->validated();
        $category->update($validated);

        return redirect()->route('admin.category.index')
            ->with('success', 'Категория успешно обновлена');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')
            ->with('success', 'Категория успешно удалена');
    }
}
