<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class ArticlesController extends Controller
{
    public function showPages()
    {
        $pages = Page::orderByDesc('created_at')->paginate();
        return view('admin.pages.pages')->with('pages', $pages);
    }
}
