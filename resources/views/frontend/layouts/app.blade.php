<!DOCTYPE html>
<html lang="{{ $lang }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3B82F6">

    {{-- SEO & Social Meta Tags --}}
    <title>@yield('title', 'Çok Dilli Blog')</title>
    @yield('meta_tags')

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Tailwind + Custom Config --}}
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
    @stack('styles')
</head>

<body class="bg-gray-50 antialiased">

    {{-- Header --}}
    <header class="bg-white/80 backdrop-blur-sm border-b sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/{{ $lang }}"
                    class="text-2xl font-bold text-gray-900 hover:text-primary transition-colors">
                    🌍 Multiblog 
                </a>

                {{-- Language Switcher --}}
                <div class="relative group" x-data="{ open: false }" x-init="open = false">
                    <button @click="open = !open"
                        class="flex items-center space-x-1 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <img src="https://flagcdn.com/{{ $currentLanguage->flag }}.svg"
                            class="w-6 h-4 rounded-sm shadow" alt="{{ $currentLanguage->name }}">
                        <span class="text-gray-700 font-medium">{{ strtoupper($currentLanguage->name) }}</span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-xl shadow-lg overflow-hidden z-50">
                        @php
                            $currentPath = base64_encode(request()->path());
                        @endphp

                        @foreach ($languages as $l)
                            @if ($l->slug !== $lang)
                                <a href="{{ route('language.switch', ['lang' => $l->slug, 'encodedPath' => $currentPath]) }}"
                                    rel="nofollow"
                                    class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                    <img src="https://flagcdn.com/{{ $l->flag }}.svg"
                                        class="w-5 h-3.5 mr-3 rounded-sm" alt="{{ $l->name }}">
                                    <span class="text-gray-700">{{ $l->name }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </nav>
    </header>


    {{-- Main Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-gray-500 text-sm">
                {{ date('Y') }} Multiblog •
                <a href="#" class="hover:text-primary transition-colors">Terms</a> •
                <a href="#" class="hover:text-primary transition-colors">Privacy</a>
            </p>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
