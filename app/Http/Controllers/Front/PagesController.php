<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PagesController extends Controller
{
    public function homePage(){
        $categories =Category::all()->sortBy('title');
        return view('front.home')->with('categories', $categories);
    }

    public function categoryPage(Category $category) {

        $category->views ++;
        $category->save();
        return view('front.category')->with('category', $category);

    }
}
