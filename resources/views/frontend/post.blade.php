<!DOCTYPE html>
<html lang="{{ $translation->language_slug ?? app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3B82F6">
    <title>{{ $translation->seo_title ?? $translation->title }}</title>
    
    <meta name="description" content="{{ $translation->seo_description ?? Str::limit(strip_tags($translation->content), 150) }}">
    <meta name="keywords" content="{{ $translation->seo_keywords ?? '' }}">
    <meta property="og:title" content="{{ $translation->seo_title ?? $translation->title }}">
    <meta property="og:description" content="{{ $translation->seo_description ?? Str::limit(strip_tags($translation->content), 150) }}">
    <meta property="og:image" content="{{ asset($translation->post->cover_image ?? 'uploads/posts/default.jpg') }}">

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .swiper-button-next,
        .swiper-button-prev {
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 50%;
            color: white;
        }
        .sticky-title {
            position: sticky;
            top: 0;
            background: rgba(255,255,255,0.9);
            z-index: 30;
            padding: 1rem 0;
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">

<header class="bg-white/80 backdrop-blur-sm border-b sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="text-2xl font-bold text-gray-900 hover:text-primary transition-colors">
                🌍 Multiblog
            </a>
        </div>
    </nav>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <article class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm p-6 lg:p-8">

        {{-- Sticky Başlık --}}
        <div class="sticky-title mb-6">
            <h1 class="text-4xl font-bold text-gray-900">{{ $translation->title }}</h1>
        </div>

        {{-- Kapak Görseli --}}
        <div class="relative mb-8">
            <img src="{{ asset($translation->post->cover_image ?? 'uploads/posts/default.jpg') }}"
                 alt="{{ $translation->title }}" class="w-full h-96 object-cover rounded-xl mb-6" loading="lazy">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                {{-- Kategori Butonu --}}
                @php
                    $categoryTranslation = null;
                    if (
                        isset($translation->post->category) &&
                        isset($translation->post->category->translations) &&
                        $translation->post->category->translations instanceof \Illuminate\Support\Collection
                    ) {
                        $categoryTranslation = $translation->post->category->translations->first();
                    } elseif (
                        isset($translation->post->category['translations']) &&
                        is_array($translation->post->category['translations'])
                    ) {
                        $categoryTranslation = collect($translation->post->category['translations'])->first();
                    }
                @endphp
                @if ($categoryTranslation)
                    <a href="{{ route('frontend.category', [$translation->language_slug, $categoryTranslation->slug]) }}"
                       class="inline-flex items-center px-3 py-1.5 bg-primary/80 text-white rounded-full text-sm font-medium hover:bg-primary/90 transition-colors">
                        {{ $categoryTranslation->name }}
                    </a>
                @endif
            </div>
        </div>

        {{-- Meta Bilgiler ve Paylaşım --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div class="flex items-center gap-4">
                {{-- Yazar --}}
                @if(isset($translation->post->user))
                    <span class="text-sm text-gray-700 font-semibold">
                        {{ $translation->post->user->name }}
                    </span>
                @endif
                {{-- Tarih --}}
                <span class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($translation->post->created_at)->translatedFormat('d F Y') }}
                </span>
                {{-- Okuma Süresi --}}
                <span class="text-sm text-gray-500">
                    {{ round(str_word_count(strip_tags($translation->content)) / 200) + 1 }} dk okuma
                </span>
            </div>
            <div class="flex flex-wrap gap-3 items-center">
                {{-- Tag'ler --}}
                @foreach ($translation->post->tags ?? [] as $tag)
                    @php
                        $tagTranslation = null;
                        if (isset($tag->translations) && $tag->translations instanceof \Illuminate\Support\Collection) {
                            $tagTranslation = $tag->translations->first();
                        } elseif (isset($tag['translations']) && is_array($tag['translations'])) {
                            $tagTranslation = collect($tag['translations'])->first();
                        }
                    @endphp
                    @if ($tagTranslation)
                        <a href="{{ route('frontend.tag', [$translation->language_slug, $tagTranslation->slug]) }}"
                           class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                            #{{ $tagTranslation->name }}
                        </a>
                    @endif
                @endforeach

            </div>
        </div>

        {{-- İçerik --}}
        <div class="prose lg:prose-xl max-w-none mb-8 text-gray-800">
            {!! $translation->content !!}
        </div>

        {{-- Galeri --}}
        @php
            $gallery = is_array($translation->post->gallery_images)
                ? $translation->post->gallery_images
                : json_decode($translation->post->gallery_images ?? '[]', true);
        @endphp

        @if (!empty($gallery))
            <div class="gallery-container mb-12">
                <div class="swiper main-swiper rounded-xl shadow-lg">
                    <div class="swiper-wrapper">
                        @foreach ($gallery as $image)
                            <div class="swiper-slide">
                                <a href="{{ asset($image) }}" data-fancybox="gallery" data-caption="Image {{ $loop->iteration }}">
                                    <img src="{{ asset($image) }}" 
                                         alt="Gallery Image {{ $loop->iteration }}"
                                         class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                         loading="lazy">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div class="swiper thumbnail-swiper mt-4">
                    <div class="swiper-wrapper">
                        @foreach ($gallery as $image)
                            <div class="swiper-slide thumbnail-slide">
                                <img src="{{ asset($image) }}" 
                                     alt="Thumbnail {{ $loop->iteration }}"
                                     class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                                     loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </article>
</main>

<footer class="border-t bg-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
        <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Multiblog. Tüm hakları saklıdır.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const thumbnailSwiper = new Swiper(".thumbnail-swiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            640: { slidesPerView: 4 },
            1024: { slidesPerView: 6 },
        },
    });

    const mainSwiper = new Swiper(".main-swiper", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: thumbnailSwiper,
        },
    });

    Fancybox.bind("[data-fancybox='gallery']", {});
</script>
</body>
</html>