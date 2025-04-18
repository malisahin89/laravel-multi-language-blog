<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [];

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
