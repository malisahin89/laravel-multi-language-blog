<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $langSlug = Language::where('is_default', 1)->value('slug') ?? 'tr';
        $posts = Post::query()
            ->select([
                'id',
                'category_id',
                'order',
                'status'
            ])
            ->with([
                'translations' => fn($q) => $q->select('id', 'post_id', 'language_slug', 'title', 'slug'),
                'translations.language' => fn($q) => $q->select('id', 'slug', 'flag')
            ])
            ->latest()
            ->paginate(10);

        // $posts = Post::with(['translations', 'category.translations', 'tags.translations'])->latest()->paginate(20);
        return view('admin.posts.index', compact('posts', 'langSlug', 'languages'));
    }

    public function create()
    {
        $languages = Language::all();
        $categories = Category::with('translations')->get();
        $tags = Tag::with('translations')->get();
        return view('admin.posts.create', compact('languages', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.slug' => 'required|string|max:255|unique:post_translations,slug',
            'category_id' => 'nullable|exists:categories,id',
            'tags.*' => 'nullable|exists:tags,id',
        ]);

        DB::beginTransaction();

        try {
            $post = new Post();
            $post->user_id = auth()->id();
            $post->category_id = $request->category_id;
            $post->order = $request->order ?? 0;
            $post->is_featured = $request->has('is_featured');
            $post->comment_enabled = $request->has('comment_enabled');
            $post->status = $request->status ?? 'draft';

            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);  // Örn: photo

                // Benzersiz path oluştur
                $uniqueFullPath = generateUniqueFilePath(public_path('uploads/posts'), $originalName, 'webp');

                // public_path kısmını kırp, sadece 'uploads/posts/...' haline getir
                $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $uniqueFullPath);

                // WebP formatına dönüştür
                convertToWebP($file, $relativePath);

                // Veritabanı için yolu kaydet
                $post->cover_image = $relativePath;
            }

            if ($request->hasFile('gallery_images')) {
                $existingImages = $post->gallery_images ?? [];

                foreach ($request->file('gallery_images') as $file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);  // 'photo'
                    $uniqueFullPath = generateUniqueFilePath(public_path('uploads/gallery'), $originalName, 'webp');

                    // Tam path'ten sadece alt yolu alalım (public_path() kısmını çıkaralım)
                    $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $uniqueFullPath);

                    // WebP'ye dönüştür
                    convertToWebP($file, $relativePath);

                    $existingImages[] = $relativePath;
                }

                $post->gallery_images = $existingImages;
            }

            $post->save();

            foreach ($request->translations as $lang => $data) {
                $slug = Str::slug($data['slug']);
                $original = $slug;
                $i = 1;
                while (\DB::table('post_translations')->where('slug', $slug)->exists()) {
                    $slug = $original . '-' . $i++;
                }

                $post->translations()->create([
                    'language_slug' => $lang,
                    'title' => $data['title'],
                    'slug' => $slug,
                    'short_description' => $data['short_description'] ?? '',
                    'content' => $data['content'] ?? '',
                    'seo_title' => $data['seo_title'] ?? null,
                    'seo_description' => $data['seo_description'] ?? null,
                    'seo_keywords' => $data['seo_keywords'] ?? null,
                ]);
            }

            if ($request->tags) {
                $post->tags()->sync($request->tags);
            }

            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Blog başarıyla eklendi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hata oluştu: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $post = Post::with(['translations', 'category.translations', 'tags.translations'])->findOrFail($id);
        $languages = Language::all();
        $categories = Category::with('translations')->get();
        $tags = Tag::with('translations')->get();

        return view('admin.posts.edit', compact('post', 'languages', 'categories', 'tags'));
    }

    public function editLang($id, $language)
    {
        $post = Post::with(['translations', 'category.translations', 'tags.translations'])->findOrFail($id);
        $languages = Language::all();
        $categories = Category::with('translations')->get();
        $tags = Tag::with('translations')->get();
        $language = Language::where('slug', $language)->first();

        return view('admin.posts.edit', compact('post', 'languages', 'categories', 'tags', 'language'));
    }

    public function update(Request $request, $id)
    {
        $validationRules = [
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:6048',
            'category_id' => 'nullable|exists:categories,id',
            'tags.*' => 'nullable|exists:tags,id',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'comment_enabled' => 'nullable|boolean',
            'status' => 'in:draft,published',
        ];

        $post = Post::findOrFail($id);

        foreach ($request->translations as $lang => $data) {
            $translation = $post->translations()->where('language_slug', $lang)->first();
            $translationId = $translation ? $translation->id : null;

            $validationRules["translations.$lang.title"] = 'required|string|max:255';
            $validationRules["translations.$lang.slug"] = 'required|string|max:255|unique:post_translations,slug,' . $translationId;
        }

        $request->validate($validationRules);

        DB::beginTransaction();

        try {
            $post = Post::findOrFail($id);
            $post->category_id = $request->category_id;
            $post->order = $request->order ?? 0;
            $post->is_featured = $request->boolean('is_featured');
            $post->comment_enabled = $request->boolean('comment_enabled');
            $post->status = $request->status ?? 'draft';

            if ($request->hasFile('cover_image')) {
                // Önce varsa eski görseli sil
                if ($post->cover_image && file_exists(public_path($post->cover_image))) {
                    @unlink(public_path($post->cover_image));
                }

                $file = $request->file('cover_image');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);  // örn: photo

                // Benzersiz .webp dosya yolu oluştur
                $uniqueFullPath = generateUniqueFilePath(public_path('uploads/posts'), $originalName, 'webp');
                $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $uniqueFullPath);

                // WebP'ye dönüştür ve kaydet
                convertToWebP($file, $relativePath);

                $post->cover_image = $relativePath;
            }

            if ($request->hasFile('gallery_images')) {
                $existingImages = $post->gallery_images ?? [];

                foreach ($request->file('gallery_images') as $file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                    // Benzersiz .webp yolu oluştur
                    $uniqueFullPath = generateUniqueFilePath(public_path('uploads/gallery'), $originalName, 'webp');
                    $relativePath = str_replace(public_path() . DIRECTORY_SEPARATOR, '', $uniqueFullPath);

                    // WebP'ye dönüştür ve kaydet
                    convertToWebP($file, $relativePath);

                    $existingImages[] = $relativePath;
                }

                $post->gallery_images = $existingImages;
            }

            $post->save();

            foreach ($request->translations as $lang => $data) {
                $translation = $post->translations()->where('language_slug', $lang)->first();

                if ($translation) {
                    $translation->update([
                        'title' => $data['title'],
                        'slug' => Str::slug($data['slug']),
                        'short_description' => $data['short_description'] ?? '',
                        'content' => $data['content'] ?? '',
                        'seo_title' => $data['seo_title'] ?? null,
                        'seo_description' => $data['seo_description'] ?? null,
                        'seo_keywords' => $data['seo_keywords'] ?? null,
                    ]);
                } else {
                    $post->translations()->create([
                        'language_slug' => $lang,
                        'title' => $data['title'],
                        'slug' => Str::slug($data['slug']),
                        'short_description' => $data['short_description'] ?? '',
                        'content' => $data['content'] ?? '',
                        'seo_title' => $data['seo_title'] ?? null,
                        'seo_description' => $data['seo_description'] ?? null,
                        'seo_keywords' => $data['seo_keywords'] ?? null,
                    ]);
                }
            }

            $post->tags()->sync($request->tags ?? []);

            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Blog başarıyla güncellendi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Güncelleme işlemi başarısız: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->status = $request->status;
        $post->save();

        return redirect()->back()->with('success', 'Status başarıyla güncellendi');
    }

    public function removeGalleryImage(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $imagePath = $request->input('image');

        if ($imagePath && file_exists(public_path($imagePath))) {
            @unlink(public_path($imagePath));
        }

        $galleryImages = $post->gallery_images ?? [];
        $galleryImages = array_filter($galleryImages, function ($img) use ($imagePath) {
            return $img !== $imagePath;
        });

        $post->gallery_images = array_values($galleryImages);
        $post->save();

        return response()->json(['success' => true]);
    }

    public function saveGalleryOrder(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $order = $request->input('order', []);

        if (!empty($order)) {
            $currentImages = $post->gallery_images ?? [];

            $sortedImages = array_filter($order, function ($img) use ($currentImages) {
                return in_array($img, $currentImages);
            });

            if (json_encode($currentImages) !== json_encode($sortedImages)) {
                $post->gallery_images = $sortedImages;
                $post->save();
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    // private function convertToWebP($imageFile, $destinationPath, $quality = 70)
    // {
    //     $imageType = $imageFile->getClientMimeType();
    //     $imageResource = null;

    //     if ($imageType == 'image/jpeg' || $imageType == 'image/jpg') {
    //         $imageResource = imagecreatefromjpeg($imageFile->getPathname());
    //     } elseif ($imageType == 'image/png') {
    //         $imageResource = imagecreatefrompng($imageFile->getPathname());
    //         imagepalettetotruecolor($imageResource);
    //     } elseif ($imageType == 'image/gif') {
    //         $imageResource = imagecreatefromgif($imageFile->getPathname());
    //     } elseif ($imageType == 'image/webp') {
    //         $imageResource = imagecreatefromwebp($imageFile->getPathname());
    //     }

    //     if (!$imageResource) {
    //         throw new \Exception('Desteklenmeyen resim formatı');
    //     }

    //     $fullPath = public_path($destinationPath);
    //     $folderPath = dirname($fullPath);

    //     if (!file_exists($folderPath)) {
    //         mkdir($folderPath, 0777, true);
    //     }

    //     imagewebp($imageResource, $fullPath, $quality);
    //     imagedestroy($imageResource);
    // }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->translations()->delete();
            $post->tags()->detach();
            if ($post->cover_image && file_exists(public_path($post->cover_image))) {
                @unlink(public_path($post->cover_image));
            }

            if ($post->gallery_images) {
                foreach ($post->gallery_images as $img) {
                    if (file_exists(public_path($img))) {
                        @unlink(public_path($img));
                    }
                }
            }

            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Blog başarıyla silindi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Silme işlemi başarısız: ' . $e->getMessage());
        }
    }
}
