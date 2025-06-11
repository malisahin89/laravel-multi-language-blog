<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

abstract class BaseFrontendController extends Controller
{
    public function __construct(Request $request)
    {
        $languages = Cache::remember('languages', now()->addHours(24), function () {
            return Language::where('status', true)->get(['id', 'slug', 'name', 'flag', 'is_default']);
        });

        $lang = $request->segment(1);
        $defaultLang = $languages->firstWhere('is_default', true)->slug ?? 'tr';
        $lang = $lang ?: $defaultLang;

        $currentLanguage = $languages->firstWhere('slug', $lang);

        view()->share([
            'languages' => $languages,
            'currentLanguage' => $currentLanguage,
            'lang' => $lang,
        ]);
    }
}
