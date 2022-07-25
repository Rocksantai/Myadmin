<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategories()
    {

        $categories = Category::all()->sortBy('title');
        return view('admin.category.categories')->with('categories', $categories);

    }

    public function newCategory()
    {
        return view('admin.category.category-new');
    }
}
