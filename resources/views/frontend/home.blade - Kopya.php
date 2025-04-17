@extends('frontend.layouts.app')

@section('title', 'Anasayfa')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        @php
            $translation = $post->translations->firstWhere('language_slug', $lang);
        @endphp

        <article class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300">
            @if($post->cover_image)
                <img 
                    src="{{ asset($post->cover_image) }}" 
                    alt="Cover" 
                    class="w-full h-48 object-cover rounded-t-2xl"
                    loading="lazy"
                >
            @endif

            <div class="p-6">
                <h3 class="text-xl font-semibold mb-3">
                    <a href="{{ route('frontend.post.show', ['lang' => $lang, 'slug' => $translation->slug]) }}" 
                       class="hover:text-primary transition-colors">
                        {{ $translation->title }}
                    </a>
                </h3>

                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ $translation->short_description ?? '' }}
                </p>

                <div class="flex items-center justify-between text-sm">
                    <a href="{{ route('frontend.post.show', ['lang' => $lang, 'slug' => $translation->slug]) }}" 
                       class="text-primary font-medium hover:underline flex items-center">
                        Read more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </article>
    @endforeach
</div>
@endsection