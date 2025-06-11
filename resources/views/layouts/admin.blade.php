<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind ve Alpine --}}
    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-800">




    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        <aside class="bg-gray-900 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-8">Yönetim Paneli</h2>

                @php
                    $routeName = Route::currentRouteName();
                @endphp

                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 rounded {{ str_starts_with($routeName, 'dashboard') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('languages.index') }}"
                        class="block px-4 py-2 rounded {{ str_starts_with($routeName, 'languages') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                        🌐 Diller
                    </a>

                    <!-- İçerik Yönetimi Dropdown -->
                    <div x-data="{ open: {{ in_array(explode('.', $routeName)[0], ['categories', 'tags', 'posts']) ? 'true' : 'false' }} } }" class="relative">
                        <button @click="open = !open"
                            class="w-full text-left px-4 py-2 rounded flex justify-between items-center {{ in_array(explode('.', $routeName)[0], ['categories', 'tags', 'posts']) ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                            <span>📦 Blog Yönetimi</span>
                        </button>
                        <div x-show="open" @click.away="open = false" class="ml-4 mt-1 space-y-1">
                            <a href="{{ route('categories.index') }}"
                                class="block px-4 py-2 text-sm rounded {{ str_starts_with($routeName, 'categories') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                                📂 Kategoriler
                            </a>
                            <a href="{{ route('tags.index') }}"
                                class="block px-4 py-2 text-sm rounded {{ str_starts_with($routeName, 'tags') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                                🏷️ Etiketler
                            </a>
                            <a href="{{ route('posts.index') }}"
                                class="block px-4 py-2 text-sm rounded {{ str_starts_with($routeName, 'posts') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                                📝 Yazılar
                            </a>
                        </div>
                    </div>

                    <hr>
                    <a href="{{ route('cacheclear') }}"
                        class="block px-4 py-2 rounded {{ str_starts_with($routeName, 'cacheclear') ? 'bg-gray-700' : 'hover:bg-gray-800' }}">
                        🧹 Cache Temizle
                    </a>


                </nav>
            </div>
        </aside>

        {{-- Content Area --}}
        <div class="flex-1 flex flex-col overflow-y-auto">
            {{-- Breeze Navigation --}}
            <header class="bg-gray-900 text-white flex items-center justify-between px-6 py-4">
                <h1 class="text-lg font-bold">Laravel Çok Dilli Blog</h1>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center text-white focus:outline-none">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414
                    1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white text-gray-700 rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                            👤 Profil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                🔒 Çıkış Yap
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
