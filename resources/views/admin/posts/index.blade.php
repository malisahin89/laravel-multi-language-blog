@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Yazı Listesi</h2>
            <a href="{{ route('posts.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Yeni Yazı Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Diller</th>
                        <th class="px-4 py-2 text-left">Kategoriler</th>
                        <th class="px-4 py-2 text-left">Etiketler</th>
                        <th class="px-4 py-2 text-center">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-4 py-2">{{ $post->id }}</td>

                            <td class="px-4 py-2">
                                @if ($post->translations->isNotEmpty())
                                    @foreach ($post->translations as $trans)
                                        <div><strong>{{ strtoupper($trans->language_slug) }}:</strong> {{ $trans->title }}
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-gray-500">No translations available</div>
                                @endif
                            </td>

                            <td class="px-4 py-2">
                                @if ($post->category && $post->category->translations->isNotEmpty())
                                    {{ $post->category->translations->where('language_slug', 'tr')->first()?->name }}
                                @else
                                    <div class="text-gray-500">No category</div>
                                @endif
                            </td>

                            <td class="px-4 py-2">
                                @if ($post->tags->isNotEmpty())
                                    @foreach ($post->tags as $tag)
                                        @if ($tag->translations->isNotEmpty())
                                            <div
                                                class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mb-1">
                                                {{ $tag->translations->first()->name }}
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="text-gray-500">No tags</div>
                                @endif
                            </td>

                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="text-blue-600 hover:underline">Düzenle</a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Silmek istiyor musun?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($posts->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center px-4 py-6 text-gray-500">Henüz yazı eklenmemiş.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
