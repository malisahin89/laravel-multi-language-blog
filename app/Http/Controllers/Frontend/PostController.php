<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\LanguageValidator;

class PostController extends Controller
{
    use LanguageValidator;

    private function validateLanguage($lang)
    {
        $languages = Language::where('status', 1)->pluck('slug')->toArray();

        if (!in_array($lang, $languages)) {
            abort(404, 'Invalid language code');
        }
    }

    public function show($lang = null, $slug)
    {
        $languages = Language::where('status', 1)->get();

        // Eğer dil parametresi verilmediyse varsayılan dil kullan
        if (!$lang) {
            $lang = $languages->firstWhere('is_default', 1)?->slug ?? 'tr';
        }

        // Dil doğrulama
        if ($lang) {
            $this->validateLanguage($lang);
        }

        $lang = $lang ?? 'tr';  // Son güvenlik önlemi
        $activeLang = $languages->firstWhere('slug', $lang);

        $post = Post::whereHas('translations', function ($q) use ($slug, $lang) {
            $q->where('slug', $slug)->where('language_slug', $lang);
        })
            ->with([
                'translations',
                'category.translations',
                'tags.translations'
            ])
            ->firstOrFail();

        $activeTranslation = $post->translations->where('language_slug', $lang)->first();

        $translatedSlugs = [];
        foreach ($post->translations as $t) {
            $translatedSlugs[$t->language_slug] = $t->slug;
        }

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->whereHas('translations', function ($q) use ($lang) {
                $q->where('language_slug', $lang);
            })
            ->with([
                'translations',
                'category.translations',
                'tags.translations'
            ])
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.post', compact(
            'post',
            'lang',
            'translatedSlugs',
            'slug',
            'activeTranslation',
            'languages',
            'activeLang',
            'relatedPosts'
        ));
    }

    public function category($lang, $slug)
    {
        $languages = Language::all();

        if ($lang) {
            $this->validateLanguage($lang);
        }

        $lang = $lang ?? $languages->firstWhere('is_default', 1)?->slug ?? 'tr';
        $activeLang = $languages->firstWhere('slug', $lang);

        $category = Category::whereHas('translations', function ($q) use ($slug, $lang) {
            $q->where('slug', $slug)->where('language_slug', $lang);
        })
            ->with([
                'translations',
                'posts.translations',
                'posts.category.translations',
                'posts.tags.translations'
            ])
            ->firstOrFail();

        $translatedSlugs = [];
        foreach ($languages as $language) {
            if ($language->slug != $lang) {
                $translation = $category->translations->firstWhere('language_slug', $language->slug);
                if ($translation) {
                    $translatedSlugs[$language->slug] = $translation->slug;
                }
            }
        }

        $posts = Post::whereHas('category', function ($q) use ($category) {
            $q->where('id', $category->id);
        })
            ->whereHas('translations', function ($q) use ($lang) {
                $q->where('language_slug', $lang);
            })
            ->with([
                'translations',
                'category.translations',
                'tags.translations'
            ])
            ->latest()
            ->paginate(10);

        return view('frontend.layouts.category', compact('category', 'posts', 'languages', 'lang', 'activeLang', 'translatedSlugs'));
    }

    public function tag($lang = null, $slug)
    {
        $languages = Language::all();

        if ($lang) {
            $this->validateLanguage($lang);
        }

        $lang = $lang ?? Language::where('is_default', 1)->value('slug') ?? 'tr';
        $activeLang = Language::where('slug', $lang)->firstOrFail();

        // etiket sorgusu
        $tag = Tag::with([
            'translations',
            'posts.translations',
            'posts.category.translations',
            'posts.tags.translations'
        ])
            ->whereHas('translations', function ($q) use ($slug, $lang) {
                $q
                    ->where('slug', $slug)
                    ->where('language_slug', $lang);
            })
            ->firstOrFail();

        // dil çeviri için slug
        $translatedSlugs = $tag
            ->translations
            ->filter(fn($t) => $t->language_slug !== $lang)
            ->mapWithKeys(fn($t) => [$t->language_slug => $t->slug])
            ->toArray();

        // İlgili yazılar
        $posts = $tag
            ->posts()
            ->whereHas('translations', function ($q) use ($lang) {
                $q->where('language_slug', $lang);
            })
            ->with([
                'translations' => function ($q) use ($lang) {
                    $q->where('language_slug', $lang);
                },
                'category.translations' => function ($q) use ($lang) {
                    $q->where('language_slug', $lang);
                },
                'tags.translations' => function ($q) use ($lang) {
                    $q->where('language_slug', $lang);
                }
            ])
            ->latest()
            ->paginate(10);

        return view('frontend.layouts.tag', compact('tag', 'posts', 'languages', 'lang', 'activeLang', 'translatedSlugs'));
    }
}
