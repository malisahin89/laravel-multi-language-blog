<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use App\Observers\LanguageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Language::observe(LanguageObserver::class);
    }
}
