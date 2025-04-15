<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'order',
        'cover_image',
        'gallery_images',
        'is_featured',
        'comment_enabled',
        'status',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'comment_enabled' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function post_category()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
}
