<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use Illuminate\Support\Facades\View;


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
        View::composer('*', function ($view) {
            $languages = Language::all(); // Tüm dilleri çek

            $lang = request()->segment(1); // URL'nin ilk segmenti, örneğin 'tr', 'en'

            $currentLanguage = $languages->firstWhere('slug', $lang);

            $view->with([
                'languages' => $languages,
                'currentLanguage' => $currentLanguage,
                'lang' => $lang,
            ]);
        });
    }
}
