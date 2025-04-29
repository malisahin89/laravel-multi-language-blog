<?php

namespace App\Observers;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;


class LanguageObserver
{
    /**
     * Handle the Language "created" event.
     */
    public function created(Language $language): void
    {
        Cache::forget('languages');
    }

    /**
     * Handle the Language "updated" event.
     */
    public function updated(Language $language): void
    {
        Cache::forget('languages');
    }

    /**
     * Handle the Language "deleted" event.
     */
    public function deleted(Language $language): void
    {
        Cache::forget('languages');
    }

    /**
     * Handle the Language "restored" event.
     */
    public function restored(Language $language): void
    {
        //
    }

    /**
     * Handle the Language "force deleted" event.
     */
    public function forceDeleted(Language $language): void
    {
        //
    }
}
