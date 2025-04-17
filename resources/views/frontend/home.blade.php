<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3B82F6">


    <title>Anasayfa</title>


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
                <a href="/tr" class="text-2xl font-bold text-gray-900 hover:text-primary transition-colors">
                    🌍 Multiblog
                </a>


                <div class="relative group" x-data="{ open: false }" x-init="open = false">
                    <button @click="open = !open"
                        class="flex items-center space-x-1 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <img src="https://flagcdn.com/tr.svg" class="w-6 h-4 rounded-sm shadow" alt="tr">
                        <span class="text-gray-700 font-medium">TR</span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-xl shadow-lg overflow-hidden z-50">
                        <a href="http://laravel-multi-language-blog.test/tr"
                            class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                            <img src="https://flagcdn.com/tr.svg" class="w-5 h-3.5 mr-3 rounded-sm" alt="Türkçe">
                            <span class="text-gray-700">Türkçe</span>
                        </a>
                        <a href="http://laravel-multi-language-blog.test/ru"
                            class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                            <img src="https://flagcdn.com/ru.svg" class="w-5 h-3.5 mr-3 rounded-sm" alt="Русский">
                            <span class="text-gray-700">Русский</span>
                        </a>
                        <a href="http://laravel-multi-language-blog.test/en"
                            class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                            <img src="https://flagcdn.com/gb.svg" class="w-5 h-3.5 mr-3 rounded-sm" alt="English">
                            <span class="text-gray-700">English</span>
                        </a>
                        <a href="http://laravel-multi-language-blog.test/fr"
                            class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                            <img src="https://flagcdn.com/fr.svg" class="w-5 h-3.5 mr-3 rounded-sm" alt="Français">
                            <span class="text-gray-700">Français</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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
    </main>


    <footer class="border-t bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-gray-500 text-sm">
                2025 Multiblog •
                <a href="#" class="hover:text-primary transition-colors">Terms</a> •
                <a href="#" class="hover:text-primary transition-colors">Privacy</a>
            </p>
        </div>
    </footer>
</body>

</html>
