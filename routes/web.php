<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\TagController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\TagController as FrontendTagController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.withoutlang');

Route::group(['prefix' => '{lang}', 'where' => ['lang' => '[a-z]{2}']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
    Route::get('/post/{slug}', [FrontendPostController::class, 'show'])->name('frontend.post.show');
    Route::get('/category/{slug}', [FrontendCategoryController::class, 'show'])->name('frontend.category');
    Route::get('/tag/{slug}', [FrontendTagController::class, 'show'])->name('frontend.tag');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // LANGUAGES
    Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
    Route::get('languages/create', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('languages', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::put('languages/{id}', [LanguageController::class, 'update'])->name('languages.update');
    Route::delete('languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');

    // POSTS
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('posts/{id}/removeGalleryImage', [PostController::class, 'removeGalleryImage'])->name('posts.removeGalleryImage');
    Route::post('posts/{id}/saveGalleryOrder', [PostController::class, 'saveGalleryOrder'])->name('posts.saveGalleryOrder');

    // CATEGORIES
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // TAGS
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

    // //////////////////////////////////////CACHE CLEAR////////////////////////////////////////
    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:cache');
        Artisan::call('optimize:clear');
        cache()->flush();
        return '<ul><li>cache:clear</li><li>config:clear</li><li>view:clear</li><li>route:clear</li><li>config:clear</li><li>optimize:clear</li></ul><h3>All Caches Cleared!!!</h3><br><button><a href="/admin">Return Back</a></button>';
    })->name('cacheclear');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// //////////////////////////////////////404 & 429////////////////////////////////////////
Route::fallback(function () {
    $ip = request()->ip();
    $key = "404_requests_{$ip}";
    $maxAttempts = 10;
    $decayMinutes = 1;
    $attempts = Cache::get($key, 0);
    if ($attempts >= $maxAttempts) {
        return response()->view('errors.429', [], 429);
    }
    Cache::put($key, $attempts + 1, now()->addMinutes($decayMinutes));

    return response()->view('errors.404', [], 404);
});
