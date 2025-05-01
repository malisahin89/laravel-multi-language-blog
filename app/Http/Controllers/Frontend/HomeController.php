<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Post;
use App\Traits\LanguageValidator;

class HomeController extends Controller
{
    use LanguageValidator;

    public function redirectToDefault()
    {
        $defaultLang = Language::where('is_default', 1)->value('slug') ?? 'tr';
        return redirect()->route('frontend.home', ['lang' => $defaultLang]);
    }

    public function index($lang = null)
    {
        $lang = $lang ?? 'tr';

        $posts = Post::query()
            ->select([
                'id',
                'category_id',
                'order',
                'cover_image',
                'status'
            ])
            ->where('status', 'published')
            ->whereHas('translations', function ($q) use ($lang) {
                $q->where('language_slug', $lang);
            })
            ->with([
                'translations' => fn($q) => $q->where('language_slug', $lang),
                'category' => fn($q) => $q
                    ->select(['id'])
                    ->with([
                        'translations' => fn($q) => $q->where('language_slug', $lang)
                    ])
            ])
            ->orderBy('order', 'asc')
            ->latest()
            ->get();

        return view('frontend.home', compact('posts', 'lang'));
    }
}
