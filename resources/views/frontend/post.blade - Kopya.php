@extends('frontend.layouts.app')

@section('title', $activeTranslation->seo_title ?? 'Post')

@section('meta_tags')
    {{-- Dinamik SEO Meta Tagları --}}
    <meta name="description"
        content="{{ $activeTranslation->seo_description ?? Str::limit(strip_tags($activeTranslation->content ?? ''), 160) }}">
    <meta name="keywords" content="{{ $activeTranslation->seo_keywords ?? 'blog, multilingual, laravel' }}">
    <meta property="og:title" content="{{ $activeTranslation->seo_title ?? ($activeTranslation->title ?? 'Post') }}">
    <meta property="og:description"
        content="{{ $activeTranslation->seo_description ?? Str::limit(strip_tags($activeTranslation->content ?? ''), 160) }}">
    <meta property="og:image" content="{{ asset($post->cover_image ?? 'default-og-image.jpg') }}">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endsection

@section('content')
    <article class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm p-6 lg:p-8">
        @if ($activeTranslation)
            {{-- Featured Image --}}
            @if ($post->cover_image)
                <div class="relative mb-8">
                    <img src="{{ asset($post->cover_image) }}" alt="{{ $activeTranslation->title }}"
                        class="w-full h-96 object-cover rounded-xl mb-6" loading="lazy">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                        <h1 class="text-4xl font-bold text-white">{{ $activeTranslation->title }}</h1>
                    </div>
                </div>
            @endif

            {{-- Meta Information --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div class="flex items-center gap-4">
                    @if ($post->author)
                        <div class="flex items-center gap-2">
                            <img src="{{ $post->author->avatar ?? asset('images/default-avatar.png') }}"
                                alt="{{ $post->author->name }}" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $post->author->name }}</h3>
                                <p class="text-sm text-gray-500">
                                    {{ $post->created_at->format('F j, Y') }}
                                    @if ($post->read_time)
                                        • {{ $post->read_time }} min read
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex flex-wrap gap-3 items-center">
                    @if ($post->category)
                        <a href="{{ route('frontend.category', ['lang' => $lang, 'slug' => $post->category->translations->firstWhere('language_slug', $lang)?->slug ?? $post->category->slug]) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium hover:bg-primary/20 transition-colors">
                            {{ $post->category->translations->firstWhere('language_slug', $lang)?->name }}
                        </a>
                    @endif

                    @foreach ($post->tags as $tag)
                        <a href="{{ route('frontend.tag', ['lang' => $lang, 'slug' => $tag->translations->firstWhere('language_slug', $lang)?->slug ?? $tag->slug]) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                            {{ $tag->translations->firstWhere('language_slug', $lang)?->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Content --}}
            <div class="prose lg:prose-xl max-w-none mb-8 text-gray-800">
                {!! $activeTranslation->content !!}
            </div>










            {{-- Gallery --}}
   
{{-- Gallery --}}
@php
    $gallery = is_array($post->gallery_images)
        ? $post->gallery_images
        : json_decode($post->gallery_images, true);
@endphp

@if (!empty($gallery))
    <div class="gallery-container mb-12">
        {{-- Main Slider --}}
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

        {{-- Thumbnail Slider --}}
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

        















            {{-- Related Posts --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6">Related Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <a
                                href="{{ route('frontend.post.show', ['lang' => $lang, 'slug' => $relatedPost->translations->firstWhere('language_slug', $lang)?->slug ?? $relatedPost->slug]) }}">
                                @if ($relatedPost->cover_image)
                                    <img src="{{ asset($relatedPost->cover_image) }}"
                                        alt="{{ $relatedPost->translations->firstWhere('language_slug', $lang)?->title }}"
                                        class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">
                                        {{ $relatedPost->translations->firstWhere('language_slug', $lang)?->title }}</h3>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ $relatedPost->translations->firstWhere('language_slug', $lang)?->excerpt }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">This content isn't available in your language</p>
            </div>
        @endif

        <div class="mt-12 border-t pt-8 text-center">
            <a href="{{ route('frontend.home', ['lang' => $lang]) }}"
                class="inline-flex items-center text-primary hover:text-primary/80 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
    </article>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />


        <style>
            .swiper-button-next,
            .swiper-button-prev {
                background: rgba(0, 0, 0, 0.4);
                padding: 20px;
                border-radius: 50%;
                color: white;
            }

            .thumbnail-swiper .swiper-slide {
                opacity: 0.5;
                cursor: pointer;
            }

            .thumbnail-swiper .swiper-slide-thumb-active {
                opacity: 1;
                border: 2px solid #0ea5e9;
                /* Tailwind primary */
            }
        </style>
    @endpush


    @push('scripts')
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

        Fancybox.bind('[data-fancybox="gallery"]');
    </script>
@endpush


@endsection
