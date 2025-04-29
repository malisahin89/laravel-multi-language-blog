<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryTranslation;
use App\Models\PostTranslation;
use App\Models\TagTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class LanguageChangeController extends Controller
{
    public function switch($targetLang, $encodedPath)
    {
        $path = base64_decode($encodedPath);

        // Şimdi güvenli şekilde yönlendirme yapabilirsin
        $segments = explode('/', $path); // ['tr', 'blog', 'slug']
        $slug = $segments[2] ?? null;

        if (!$slug) {
            return redirect()->route('frontend.home', ['lang' => $targetLang]);
        }

        // Hangi route?
        $firstSegment = $segments[1] ?? null;

        switch ($firstSegment) {
            case 'blog':
                $tr = PostTranslation::where('slug', $slug)->where('language_slug', $segments[0])->first();
                if ($tr) {
                    $new = PostTranslation::where('post_id', $tr->post_id)
                        ->where('language_slug', $targetLang)
                        ->first();
                    if ($new) {
                        return redirect()->route('frontend.post.show', ['lang' => $targetLang, 'slug' => $new->slug]);
                    }
                }
                break;

            case 'category':
                $tr = CategoryTranslation::where('slug', $slug)->where('language_slug', $segments[0])->first();
                if ($tr) {
                    $new = CategoryTranslation::where('category_id', $tr->category_id)
                        ->where('language_slug', $targetLang)
                        ->first();
                    if ($new) {
                        return redirect()->route('frontend.category', ['lang' => $targetLang, 'slug' => $new->slug]);
                    }
                }
                break;

            case 'tag':
                $tr = TagTranslation::where('slug', $slug)->where('language_slug', $segments[0])->first();
                if ($tr) {
                    $new = TagTranslation::where('tag_id', $tr->tag_id)
                        ->where('language_slug', $targetLang)
                        ->first();
                    if ($new) {
                        return redirect()->route('frontend.tag', ['lang' => $targetLang, 'slug' => $new->slug]);
                    }
                }
                break;
        }

        // Çevrilemeyen içerikler için fallback:
        // return "not found";
        return redirect()->route('frontend.home', ['lang' => $targetLang]);
    }
}
