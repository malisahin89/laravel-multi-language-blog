<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryTranslation extends Model
{
    protected $fillable = [
        'category_id', 'language_slug', 'name', 'slug',
        'seo_title', 'seo_description', 'seo_keywords'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
