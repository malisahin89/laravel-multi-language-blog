@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Yazılar --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-t-4 border-blue-500">
            <div class="text-sm text-gray-500">📝 Toplam Yazı</div>
            <div class="text-4xl font-extrabold text-gray-800 mt-2">{{ $totalPosts }}</div>
        </div>

        {{-- Diller --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-t-4 border-green-500">
            <div class="text-sm text-gray-500">🌐 Toplam Dil</div>
            <div class="text-4xl font-extrabold text-gray-800 mt-2">{{ $totalLanguages }}</div>
        </div>

        {{-- Kategoriler --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-t-4 border-yellow-500">
            <div class="text-sm text-gray-500">📂 Toplam Kategori</div>
            <div class="text-4xl font-extrabold text-gray-800 mt-2">{{ $totalCategories }}</div>
        </div>

        {{-- Etiketler --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center border-t-4 border-pink-500">
            <div class="text-sm text-gray-500">🏷️ Toplam Etiket</div>
            <div class="text-4xl font-extrabold text-gray-800 mt-2">{{ $totalTags }}</div>
        </div>
    </div>
@endsection
