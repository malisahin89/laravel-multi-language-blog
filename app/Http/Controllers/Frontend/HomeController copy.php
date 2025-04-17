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

    private function validateLanguage($lang)
    {
        $languages = Language::where('status', 1)->pluck('slug')->toArray();
        
        if (!in_array($lang, $languages)) {
            abort(404, 'Invalid language code');
        }
    }

    public function index($lang = null)
    {
        $languages = Language::where('status', 1)->get();
    
        // Eğer $lang yoksa varsayılanı bul
        $lang = $lang ?? $languages->firstWhere('is_default', 1)?->slug ?? 'tr';
        
        // Dil kodunu kontrol et
        if ($lang) {
            $this->validateLanguage($lang);
        }
        
        $activeLang = $languages->firstWhere('slug', $lang);
    
        $posts = Post::with([
            'translations' => fn($q) => $q->where('language_slug', $lang)
        ])->latest()->get();
    
        return view('frontend.home', compact('posts', 'lang', 'languages', 'activeLang'));
    }
}
