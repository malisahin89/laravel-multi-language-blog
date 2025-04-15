@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Kategori Listesi</h2>
            <a href="{{ route('categories.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Yeni Kategori Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Diller</th>
                        <th class="px-4 py-2 text-center">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($categories as $category)
                        <tr>
                            <td class="px-4 py-2">{{ $category->id }}</td>
                            <td class="px-4 py-2">
                                @foreach($category->translations as $trans)
                                    <div><span class="font-semibold">{{ strtoupper($trans->language_slug) }}:</span> {{ $trans->name }}</div>
                                @endforeach
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="text-blue-600 hover:underline">Düzenle</a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Silmek istediğine emin misin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($categories->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center px-4 py-6 text-gray-500">Kategori bulunamadı.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
