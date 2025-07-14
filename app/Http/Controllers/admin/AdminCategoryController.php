<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;

class AdminCategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }
}
