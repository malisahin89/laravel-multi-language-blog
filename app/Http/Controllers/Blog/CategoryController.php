<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('translations')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $languages = Language::where('status', true)->get();
        return view('admin.categories.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'translations.*.name' => 'required',
            'translations.*.slug' => 'nullable',
        ]);

        $category = Category::create();

        foreach ($request->translations as $lang => $data) {
            $slug = $data['slug'] ?? null;
    
            $category->translations()->create([
                'language_slug' => $lang,
                'name' => $data['name'],
                'slug' => $slug ? Str::slug($slug) : Str::slug($data['name']),
                'seo_title' => $data['seo_title'],
                'seo_description' => $data['seo_description'],
                'seo_keywords' => $data['seo_keywords'],
            ]);
        }

        return redirect()->route('categories.index')->with('success', 'Category created.');
    }

    public function edit($id)
    {
        $category = Category::with('translations')->findOrFail($id);
        $languages = Language::where('status', true)->get();
        return view('admin.categories.edit', compact('category', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        foreach ($request->translations as $lang => $data) {
            $slug = $data['slug'] ?? null;
    
            $category->translations()->updateOrCreate(
                ['language_slug' => $lang],
                [
                    'name' => $data['name'],
                    'slug' => $slug ? Str::slug($slug) : Str::slug($data['name']),
                    'seo_title' => $data['seo_title'],
                    'seo_description' => $data['seo_description'],
                    'seo_keywords' => $data['seo_keywords'],
                ]
            );
        }

        return redirect()->route('categories.index')->with('success', 'Category updated.');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
}
