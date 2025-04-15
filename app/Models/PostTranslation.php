<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'post_id',
        'language_slug',
        'title',
        'slug',
        'short_description',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
