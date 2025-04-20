<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Tag;
use App\Traits\LanguageValidator;

class PostController extends Controller
{
    use LanguageValidator;

    public function show($lang = null, $slug)
    {
        if ($lang) {
            $this->validateLanguage($lang);
        }

        $translation = PostTranslation::where('slug', $slug)
            ->where('language_slug', $lang)
            ->with([
                'post',
                'post.category.translations' => function ($q) use ($lang) {
                    $q->where('language_slug', $lang);
                },
                'post.tags.translations' => function ($q) use ($lang) {
                    $q->select('tag_id', 'name', 'slug')->where('language_slug', $lang);
                },
            ])
            ->firstOrFail();
        return view('frontend.post', [
            'translation' => $translation,
        ]);
    }
}
