<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $langSlug = Language::where('is_default', 1)->value('slug') ?? 'tr';
        $tags = Tag::with('translations')->get();
        return view('admin.tags.index', compact('tags', 'langSlug'));
    }

    public function create()
    {
        $languages = Language::where('status', true)->get();
        return view('admin.tags.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'translations.*.name' => 'required',
            'translations.*.slug' => 'nullable',
        ]);

        $tag = Tag::create();

        foreach ($request->translations as $lang => $data) {
            $slug = $data['slug'] ?? null;
    
            $tag->translations()->create([
                'language_slug' => $lang,
                'name' => $data['name'],
                'slug' => $slug ? Str::slug($slug) : Str::slug($data['name']),
                'seo_title' => $data['seo_title'],
                'seo_description' => $data['seo_description'],
                'seo_keywords' => $data['seo_keywords'],
            ]);
        }

        return redirect()->route('tags.index')->with('success', 'Tag created.');
    }

    public function edit($id)
    {
        $tag = Tag::with('translations')->findOrFail($id);
        $languages = Language::where('status', true)->get();
        return view('admin.tags.edit', compact('tag', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        foreach ($request->translations as $lang => $data) {
            $slug = $data['slug'] ?? null;
    
            $tag->translations()->updateOrCreate(
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

        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}
