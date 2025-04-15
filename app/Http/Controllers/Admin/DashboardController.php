<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPosts' => Post::count(),
            'totalLanguages' => Language::count(),
            'totalCategories' => Category::count(),
            'totalTags' => Tag::count(),
        ]);
    }
}
