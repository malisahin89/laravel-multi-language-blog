<?php

namespace App\Traits;

use App\Models\Language;

trait LanguageValidator
{
    /**
     * Dil kodunun geçerliliğini kontrol eder
     *
     * @param string $lang
     * @return void
     */
    protected function validateLanguage($lang)
    {
        $languages = Language::where('status', 1)->pluck('slug')->toArray();

        if (!in_array($lang, $languages)) {
            abort(404, 'Invalid language code');
        }
    }
}
