<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;



class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View::composer('*', function ($view) {
        //     $languages = Cache::remember('languages', now()->addHours(24), function () {
        //         return Language::all();
        //     });
    
        //     $lang = request()->segment(1);
        //     $defaultLang = $languages->firstWhere('is_default', true)->slug ?? 'tr';
        //     $lang = $lang ?? $defaultLang;
    
        //     $currentLanguage = $languages->firstWhere('slug', $lang);
    
        //     $view->with([
        //         'languages' => $languages,
        //         'currentLanguage' => $currentLanguage,
        //         'lang' => $lang,
        //     ]);
        // });
    }
}

