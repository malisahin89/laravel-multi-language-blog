<?php

namespace App\Http\Controllers;

use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\TagTranslation;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $languages = Language::select('id', 'slug', 'status', 'is_default')->where('status', 1)->get();
        $posts = collect();
        $categories = collect();
        $tags = collect();
        foreach ($languages as $language) {
            $lang = $language->slug;
            $posts = $posts->merge(Post::query()
                ->select([
                    'id',
                    'category_id',
                    'order',
                    'status'
                ])
                ->where('status', 'published')
                ->with([
                    'translations' => fn($q) => $q->select('id', 'post_id', 'language_slug', 'slug', 'updated_at')->where('language_slug', $lang),
                ])
                ->orderBy('order', 'asc')
                ->latest()
                ->get());
            $categories = $categories->merge(CategoryTranslation::query()
                ->select([
                    'id',
                    'category_id',
                    'language_slug',
                    'slug'
                ])
                ->where('language_slug', $lang)
                ->get());
            $tags = $tags->merge(TagTranslation::query()
                ->select([
                    'id',
                    'tag_id',
                    'language_slug',
                    'slug'
                ])
                ->where('language_slug', $lang)
                ->get());
        }

        $sitemap = view('sitemap', compact('posts', 'categories', 'tags'));

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
