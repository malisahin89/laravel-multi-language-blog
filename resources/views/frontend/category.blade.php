@extends('frontend.layouts.app')

@section('title', $categoryTranslation->seo_title)

@section('meta_tags')
<meta name="description" content="{{ $categoryTranslation->seo_description }}">
<meta name="keywords" content="{{ $categoryTranslation->seo_keywords }}">
@endsection



@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm p-6 lg:p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-4">{{ $categoryTranslation->name }}</h1>
        <p class="text-gray-600">{{ $posts->total() }} posts in this category</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <a href="{{ route('frontend.post.show', [$lang, $post->translations->firstWhere('language_slug', $lang)->slug]) }}">
                    <img src="{{ asset($post->cover_image) }}" 
                         alt="{{ $post->translations->firstWhere('language_slug', $lang)->title }}" 
                         class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('frontend.post.show', [$lang, $post->translations->firstWhere('language_slug', $lang)->slug]) }}"
                       class="block font-semibold text-gray-900 hover:text-primary transition-colors">
                        {{ $post->translations->firstWhere('language_slug', $lang)->title }}
                    </a>
                    <p class="text-gray-600 mt-2 line-clamp-2">
                        {{ $post->translations->firstWhere('language_slug', $lang)->short_description }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection
