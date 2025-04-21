<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Traits\LanguageValidator;

class CategoryController extends Controller
{
    use LanguageValidator;

    public function show($lang, $slug)
    {
        if ($lang) {
            $this->validateLanguage($lang);
        }

        $categoryTranslation = CategoryTranslation::select('id', 'category_id', 'language_slug', 'name', 'slug', 'seo_title', 'seo_description', 'seo_keywords')
            ->where('slug', $slug)
            ->where('language_slug', $lang)
            ->firstOrFail();

        $categoryId = $categoryTranslation->category_id;

        $category = Category::findOrFail($categoryId);

        $posts = Post::select([
            'id',
            'category_id',
            'order',
            'cover_image',
            'status'
        ])
            ->where('status', 'published')
            ->where('category_id', $categoryId)
            ->orderBy('posts.order', 'asc')
            ->with(['translationsFrontend' => function ($query) use ($lang) {
                $query
                    ->where('language_slug', $lang)
                    ->select('id', 'post_id', 'language_slug', 'title', 'slug');
            }])
            ->latest()
            ->paginate(10);

        return view('frontend.category', compact('category', 'categoryTranslation', 'posts', 'lang'));
    }
}
