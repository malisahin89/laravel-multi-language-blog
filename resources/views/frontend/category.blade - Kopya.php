@extends('frontend.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-4">{{ $category->translations->firstWhere('language_slug', $lang)->name }}</h1>
            <p class="text-gray-600">{{ $posts->total() }} posts in this category</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('frontend.post.show', ['lang' => $lang, 'slug' => $post->translations->firstWhere('language_slug', $lang)?->slug ?? $post->slug]) }}">
                        @if ($post->cover_image)
                            <img src="{{ asset($post->cover_image) }}" 
                                 alt="{{ $post->translations->firstWhere('language_slug', $lang)?->title }}" 
                                 class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $post->translations->firstWhere('language_slug', $lang)?->title }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-2">
                                {{ $post->translations->firstWhere('language_slug', $lang)?->excerpt }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
@endsection