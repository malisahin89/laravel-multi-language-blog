<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagTranslation;
use App\Traits\LanguageValidator;

class TagController extends BaseFrontendController
{
    use LanguageValidator;

    public function show($lang = null, $slug)
    {
        if ($lang) {
            $this->validateLanguage($lang);
        }
    
        // Tag çevirisi
        $tagTranslation = TagTranslation::select('id', 'tag_id', 'language_slug', 'name', 'slug', 'seo_title', 'seo_description', 'seo_keywords')
            ->where('slug', $slug)
            ->where('language_slug', $lang)
            ->firstOrFail();
    
        $tagId = $tagTranslation->tag_id;
    
        // Tag bilgisi
        $tag = Tag::findOrFail($tagId);
    
        // Post sorgusu
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
        ->whereHas('translations', function ($query) use ($lang) {
            $query->where('language_slug', $lang);
        })
        ->with([
            'translations' => function ($query) use ($lang) {
                $query->where('language_slug', $lang)
                    ->select('id', 'post_id', 'language_slug', 'title', 'slug', 'short_description');
            }
        ])
        ->orderBy('posts.order', 'asc')
        ->latest()
        ->paginate(10);
    
        // Dil bilgileri
        $languages = Language::all();
        $currentLanguage = $languages->firstWhere('slug', $lang);
    
        return view('frontend.tag', compact('posts', 'tag', 'tagTranslation', 'languages', 'currentLanguage', 'lang'));
    }
}
