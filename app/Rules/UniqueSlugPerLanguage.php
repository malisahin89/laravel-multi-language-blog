<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Closure;

class UniqueSlugPerLanguage implements ValidationRule
{
    protected string $lang;
    protected ?int $ignorePostId;

    public function __construct(string $lang, ?int $ignorePostId = null)
    {
        $this->lang = $lang;
        $this->ignorePostId = $ignorePostId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table('post_translations')
            ->where('slug', $value)
            ->where('language_slug', $this->lang); 

        if ($this->ignorePostId !== null) {
            $query->where('post_id', '<>', $this->ignorePostId);
        }

        $existingRecords = DB::table('post_translations')
            ->where('slug', $value)
            ->where('language_slug', $this->lang)
            ->get();

        $exists = $query->exists();

        if ($exists) {
            $fail("'{$value}' slug'ı {$this->lang} dilinde zaten kullanılıyor.");
        }
    }
}
