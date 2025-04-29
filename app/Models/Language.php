<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Observers\LanguageObserver;

class Language extends Model
{

    protected $fillable = ['name', 'slug', 'flag', 'status', 'is_default'];

    protected static function booted()
    {
        static::observe(LanguageObserver::class);
    }
}
