<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Post;
use App\Traits\LanguageValidator;

class HomeController extends Controller
{
    use LanguageValidator;

    // / yönlendirmesi için (istersen kullanabilirsin)
    public function redirectToDefault()
    {
        $defaultLang = Language::where('is_default', 1)->value('slug') ?? 'tr';
        return redirect()->route('frontend.home', ['lang' => $defaultLang]);
    }

    public function index($lang = null)
    {
        // buraya dön geri
        $lang = $lang ?? 'tr';

        // Sorgu düzeltildi
        $posts = Post::query()
            ->select([
                'id',
                'category_id',
                'order',
                'cover_image',
                'status'
            ])
            ->where('status', 'published')
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
