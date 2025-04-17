<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];

    public function translations(): HasMany
    {
        return $this
            ->hasMany(CategoryTranslation::class, 'category_id')
            ->select([
                'id',
                'category_id',
                'name',
                'slug'
            ]);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
