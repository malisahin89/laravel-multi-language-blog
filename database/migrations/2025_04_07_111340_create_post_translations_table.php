<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('language_slug', 10);
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->timestamps();

            // Her post için her dilde sadece bir çeviri olması için
            $table->unique(['post_id', 'language_slug'], 'post_translations_post_lang_unique');
            
            // Her dilde slug'ların benzersiz olması için (slug + language_slug kombinasyonu unique)
            $table->unique(['slug', 'language_slug'], 'post_translations_slug_lang_unique');

            $table->index(['language_slug', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_translations');
    }
};