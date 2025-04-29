@extends('frontend.layouts.app')

@section('title', 'Multiblog')

@section('meta_tags')

@endsection



@section('content')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($posts as $post)
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ $post->cover_image }}" alt="{{ $post->translations->first()->title ?? '' }}"
                        class="w-full h-48 object-cover rounded-t-2xl" loading="lazy">

                    <div class="p-6">
                        <!-- Kategori gösterimi -->
                        @if ($post->category && $post->category->translations->isNotEmpty())
                            <div class="mb-3">
                                <a href="{{ route('frontend.category', [$lang, $post->category->translations->first()->slug ?? '']) }}"
                                    class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $post->category->translations->first()->name ?? '' }}
                                </a>

                                <div
                                    class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $post->translations->first()->updated_at->format('d.m.Y') ?? '' }}
                                </div>
                            </div>
                        @endif

                        <h3 class="text-xl font-semibold mb-3">
                            <a href="{{ route('frontend.post.show', [$lang, $post->translations->first()->slug ?? '']) }}"
                                class="hover:text-primary transition-colors">
                                {{ $post->translations->first()->title ?? '' }}
                            </a>
                        </h3>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $post->translations->first()->short_description ?? '' }}
                        </p>

                        <div class="flex items-center justify-between text-sm">
                            <a href="{{ route('frontend.post.show', [$lang, $post->translations->first()->slug ?? '']) }}"
                                class="text-primary font-medium hover:underline flex items-center">
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-center text-gray-500">No posts found.</p>
            @endforelse

        </div>

@endsection