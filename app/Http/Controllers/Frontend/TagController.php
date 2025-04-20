<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagTranslation;
use App\Traits\LanguageValidator;

class TagController extends Controller
{
    use LanguageValidator;

    public function show($lang = null, $slug)
    {
        if ($lang) {
            $this->validateLanguage($lang);
        }

        $tagTranslation = TagTranslation::select('id', 'tag_id', 'language_slug', 'name', 'slug', 'seo_title', 'seo_description', 'seo_keywords')
            ->where('slug', $slug)
            ->where('language_slug', $lang)
            ->firstOrFail();

        $tagId = $tagTranslation->tag_id;

        $tag = Tag::findOrFail($tagId);

        $posts = Post::select([
            'id',
            'category_id',
            'order',
            'cover_image',
            'status'
        ])
            ->where('status', 'published')
            ->whereHas('tags', function ($query) use ($tagId) {
                $query->where('tags.id', $tagId);
            })
            ->orderBy('posts.order', 'asc')
            ->with(['translationsFrontend' => function ($query) use ($lang) {
                $query
                    ->where('language_slug', $lang)
                    ->select('id', 'post_id', 'language_slug', 'title', 'slug');
            }])
            ->latest()
            ->paginate(10);

        return view('frontend.tag', compact('posts', 'lang', 'tag', 'tagTranslation'));
    }
}
