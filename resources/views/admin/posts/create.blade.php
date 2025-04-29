@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto mt-10">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Genel Bilgiler Bölümü -->
            <div class="bg-white p-6 shadow rounded-lg space-y-4">
                <h2 class="text-xl font-semibold mb-4">Genel Bilgiler</h2>

                <!-- Kategori Seçimi -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Kategori:</label>
                    <select name="category_id" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        <option value="">Seçiniz</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->translations->where('language_slug', 'tr')->first()?->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Etiketler -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Etiketler:</label>
                    <div class="flex flex-wrap gap-2 border rounded-lg p-2">
                        @foreach ($tags as $tag)
                            <label
                                class="flex items-center space-x-2 bg-gray-100 px-3 py-1 rounded-full hover:bg-blue-100 transition">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    class="rounded text-blue-600 focus:ring-blue-500">
                                <span
                                    class="text-sm text-gray-700">{{ $tag->translations->where('language_slug', 'tr')->first()?->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Kapak Fotoğrafı -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Kapak Fotoğrafı:</label>
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <img src="" class="h-32 w-32 object-cover rounded-lg shadow hidden" id="cover-preview">
                            <button type="button"
                                onclick="document.getElementById('cover_image').value = ''; document.getElementById('cover-preview').src = ''"
                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition hidden">
                                ✕
                            </button>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="cover_image" id="cover_image"
                                class="border rounded-lg w-full px-3 py-2" onchange="previewCover(event)">
                        </div>
                    </div>
                </div>

                <!-- Galeri Fotoğrafları -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Galeri Fotoğrafları:</label>
                    <div class="border-2 border-dashed rounded-lg p-4 text-center cursor-pointer" id="gallery-dropzone"
                        ondragover="event.preventDefault(); this.classList.add('border-blue-500')"
                        ondragleave="this.classList.remove('border-blue-500')" ondrop="handleDrop(event)">
                        <p class="text-gray-500 mb-2">Dosyaları sürükleyip bırakın veya tıklayın</p>
                        <input type="file" name="gallery_images[]" multiple class="hidden" id="gallery-input"
                            onchange="previewGallery(event)">
                        <button type="button" onclick="document.getElementById('gallery-input').click()"
                            class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-200 transition">
                            Dosya Seç
                        </button>
                    </div>

                    <!-- Galeri Önizleme -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4" id="gallery-preview">
                        <!-- Yeni yüklenen resimler burada gösterilecek -->
                    </div>
                </div>

                <!-- Diğer Alanlar -->
                <div class="space-y-2">
                    <label class="block text-gray-700">Sıralama:</label>
                    <input type="number" name="order" value="{{ old('order') }}"
                        class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="is_featured" value="1"
                            class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="text-gray-700">Öne Çıkar</span>
                    </label>

                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="comment_enabled" value="1" checked
                            class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="text-gray-700">Yorum Açık</span>
                    </label>
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700">Durum:</label>
                    <select name="status" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        <option value="draft">Taslak</option>
                        <option value="published">Yayınlandı</option>
                    </select>
                </div>
            </div>

            <!-- Çoklu Dil İçeriği Bölümü -->
            <div class="bg-white p-6 shadow rounded-lg space-y-4">
                <h2 class="text-xl font-semibold mb-4">Çoklu Dil İçeriği</h2>

                @foreach ($languages as $lang)
                    @if ($lang->is_default === 1)
                        <div class="border border-gray-200 rounded-lg p-4 space-y-3 bg-gray-50">
                            <h3 class="text-lg font-semibold text-gray-700">{{ strtoupper($lang->name) }}</h3>

                            <!-- Başlık -->
                            <div class="space-y-1">
                                <label class="block text-gray-700">Başlık:</label>
                                <input type="text" name="translations[{{ $lang->slug }}][title]"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                    placeholder="Başlık girin" required>
                            </div>

                            <!-- Slug -->
                            <div class="space-y-1">
                                <label class="block text-gray-700">Slug:</label>
                                <input type="text" name="translations[{{ $lang->slug }}][slug]"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                    placeholder="SEO dostu URL" required>
                            </div>

                            <!-- Kısa Açıklama -->
                            <div class="space-y-1">
                                <label class="block text-gray-700">Kısa Açıklama:</label>
                                <textarea name="translations[{{ $lang->slug }}][short_description]"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="3"
                                    placeholder="Özet bilgi"></textarea>
                            </div>

                            <!-- İçerik -->
                            <div class="space-y-1">
                                <label class="block text-gray-700">İçerik:</label>
                                <textarea name="translations[{{ $lang->slug }}][content]"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="6"
                                    placeholder="Detaylı içerik" id="content" spellcheck="false" autocomplete="off"></textarea>
                            </div>

                            <!-- SEO Alanları -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="space-y-1">
                                    <label class="block text-gray-700">SEO Başlık:</label>
                                    <input type="text" name="translations[{{ $lang->slug }}][seo_title]"
                                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                        placeholder="Meta title">
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-gray-700">SEO Açıklama:</label>
                                    <input type="text" name="translations[{{ $lang->slug }}][seo_description]"
                                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                        placeholder="Meta description">
                                </div>

                                <div class="space-y-1">
                                    <label class="block text-gray-700">SEO Anahtar Kelimeler:</label>
                                    <input type="text" name="translations[{{ $lang->slug }}][seo_keywords]"
                                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                                        placeholder="Meta keywords">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Gönder Butonu -->
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition w-full md:w-auto">
                Kaydet
            </button>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs/Sortable.min.js"></script>
        <script>
            $('#content').summernote({
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['codeview']]
                ]
            });

            // Kapak Fotoğrafı Önizleme
            function previewCover(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('cover-preview');
                    const removeBtn = preview.previousElementSibling;
                    if (preview) {
                        preview.src = reader.result;
                        preview.classList.remove('hidden');
                        removeBtn.classList.remove('hidden');
                    }
                };
                if (event.target.files[0]) {
                    reader.readAsDataURL(event.target.files[0]);
                }
            }

            // Galeri Yönetimi
            function previewGallery(event) {
                const files = event.target.files;
                const previewContainer = document.getElementById('gallery-preview');

                for (let file of files) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative group';
                        div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg shadow">
                    <button 
                        type="button" 
                        onclick="this.parentElement.remove()" 
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                    >
                        ✕
                    </button>
                `;
                        previewContainer.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Sürükle-Bırak İşlevselliği
            function handleDrop(e) {
                e.preventDefault();
                e.target.classList.remove('border-blue-500');
                const files = e.dataTransfer.files;
                const input = document.getElementById('gallery-input');
                input.files = files;
                previewGallery({
                    target: input
                });
            }

            // Sıralama için Sortable.js
            document.addEventListener('DOMContentLoaded', function() {
                const galleryPreview = document.getElementById('gallery-preview');

                new Sortable(galleryPreview, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    handle: '.group'
                });
            });
        </script>
    @endpush



    @push('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <style>
            #gallery-dropzone {
                transition: border-color 0.3s ease, background-color 0.3s ease;
            }

            #gallery-dropzone:hover {
                border-color: #3B82F6;
                background-color: #f8fafc;
            }

            .sortable-ghost {
                opacity: 0.5;
                background: #c8ebfb;
            }
        </style>
    @endpush
    @endsection
