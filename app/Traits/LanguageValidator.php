<?php

namespace App\Traits;

use App\Models\Language;
use Illuminate\Support\Facades\App;

trait LanguageValidator
{
    /**
     * Mevcut dil kodunun geçerli olup olmadığını kontrol eder
     */
    protected function validateLanguage(string $lang): void
    {
        $languages = Language::pluck('slug')->toArray();
        if (!in_array($lang, $languages)) {
            abort(404, 'Invalid language code');
        }
    }

    /**
     * Mevcut dil kodunu döndürür, geçerli değilse varsayılan dili döndürür
     */
    protected function getValidLanguage(string $lang): string
    {
        $languages = Language::pluck('slug')->toArray();
        return in_array($lang, $languages) ? $lang : App::getLocale();
    }

    /**
     * Dil geçiş linklerini oluşturur
     */
    protected function getLanguageSwitchLinks(string $currentLang, string $currentUrl): array
    {
        $languages = Language::all();
        $links = [];

        foreach ($languages as $language) {
            if ($language->slug !== $currentLang) {
                $translatedSlug = $this->getTranslatedSlug($language->slug);
                $links[$language->slug] = $this->generateLanguageUrl($currentUrl, $translatedSlug);
            }
        }

        return $links;
    }

    /**
     * Verilen dil için çeviri slug'ını döndürür
     */
    protected function getTranslatedSlug(string $languageSlug): ?string
    {
        // Bu metod model bazlı implementasyon gerektirir
        return null;
    }

    /**
     * Yeni dil URL'sini oluşturur
     */
    protected function generateLanguageUrl(string $currentUrl, string $translatedSlug): string
    {
        // URL'deki dil kodunu yeni dil kodu ile değiştir
        return preg_replace('/\/[a-z]{2}\//', "/{$translatedSlug}/", $currentUrl);
    }
}