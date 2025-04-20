<!DOCTYPE html>
<html lang="{{ $lang }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3B82F6">
    <title>{{ $categoryTranslation->seo_title }} - Multiblog</title>
    <meta name="description" content="{{ $categoryTranslation->seo_description }}">
    <meta name="keywords" content="{{ $categoryTranslation->seo_keywords }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 antialiased">
    <header class="bg-white/80 backdrop-blur-sm border-b sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/{{ $lang }}"
                    class="text-2xl font-bold text-gray-900 hover:text-primary transition-colors">
                    🌍 Multiblog
                </a>

                <div class="relative group" x-data="{ open: false }" x-init="open = false">
                    <button @click="open = !open"
                        class="flex items-center space-x-1 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <img src="https://flagcdn.com/{{ $lang }}.svg" class="w-6 h-4 rounded-sm shadow"
                            alt="{{ $lang }}">
                        <span class="text-gray-700 font-medium">{{ strtoupper($lang) }}</span>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white border rounded-xl shadow-lg overflow-hidden z-50">
                        {{-- @foreach(config('app.languages') as $language)
                            <a href="{{ route('category.show', [$language, $category->translations->firstWhere('language_slug', $language)->slug]) }}"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://flagcdn.com/{{ $language }}.svg" class="w-5 h-3.5 mr-3 rounded-sm"
                                     alt="{{ $language }}">
                                <span class="text-gray-700">{{ config('app.languages.'.$language) }}</span>
                            </a>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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
    </main>

    <footer class="border-t bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} Multiblog. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
