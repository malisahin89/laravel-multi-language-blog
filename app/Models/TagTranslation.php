<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TagTranslation extends Model
{
    protected $fillable = [
        'tag_id', 'language_slug', 'name', 'slug',
        'seo_title', 'seo_description', 'seo_keywords'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
