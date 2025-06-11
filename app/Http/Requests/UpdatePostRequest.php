<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueSlugPerLanguage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $translations = $this->input('translations', []);
        $postId = $this->getPostId();
        
        foreach ($translations as $lang => $data) {
            // Eğer slug boş veya yoksa, benzersiz slug üret
            if (empty($data['slug']) && !empty($data['title'])) {
                $translations[$lang]['slug'] = $this->generateUniqueSlug($data['title'], $lang, $postId);
            }
        }
        
        $this->merge(['translations' => $translations]);
    }

    //Route'tan post ID'sini al
    private function getPostId()
    {
        $postId = $this->route('id') ?? $this->route('post');
        
        if (!$postId) {
            $postId = $this->route()->parameter('id') ?? $this->route()->parameter('post');
        }
        
        return $postId;
    }

    //Benzersiz slug üret
    private function generateUniqueSlug(string $title, string $language, ?int $ignorePostId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;
        
        // Slug mevcut mu kontrol et, varsa sonuna sayı ekle
        while ($this->slugExists($slug, $language, $ignorePostId)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
            
            // Sonsuz döngüye girmesin diye güvenlik
            if ($counter > 100) {
                $slug = $originalSlug . '-' . time(); // Zaman damgası ekle
                break;
            }
        }
        
        return $slug;
    }
    
    //Slug'ın var olup olmadığını kontrol et
    private function slugExists(string $slug, string $language, ?int $ignorePostId = null): bool
    {
        $query = DB::table('post_translations')
            ->where('slug', $slug)
            ->where('language_slug', $language);
            
        if ($ignorePostId) {
            $query->where('post_id', '!=', $ignorePostId);
        }
        
        return $query->exists();
    }

    public function rules(): array
    {
        $postId = $this->getPostId();

        $rules = [
            'category_id' => ['nullable', 'exists:categories,id'],
            'order' => ['nullable', 'integer'],
            'cover_image' => ['nullable', 'image'],
            'gallery_images.*' => ['nullable', 'image'],
            'is_featured' => ['nullable', 'boolean'],
            'comment_enabled' => ['nullable', 'boolean'],
            'status' => ['nullable', 'in:draft,published,archived'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'exists:tags,id'],
        ];

        foreach ($this->input('translations', []) as $lang => $translation) {
            $rules["translations.$lang.title"] = ['required', 'string', 'max:255'];
            $rules["translations.$lang.slug"] = [
                'required',
                'string',
                'max:255',
                new UniqueSlugPerLanguage($lang, $postId)
            ];
            $rules["translations.$lang.short_description"] = ['nullable', 'string'];
            $rules["translations.$lang.content"] = ['nullable', 'string'];
            $rules["translations.$lang.seo_title"] = ['nullable', 'string', 'max:255'];
            $rules["translations.$lang.seo_description"] = ['nullable', 'string', 'max:255'];
            $rules["translations.$lang.seo_keywords"] = ['nullable', 'string', 'max:255'];
        }

        return $rules;
    }
}