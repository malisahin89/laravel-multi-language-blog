@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Dil Listesi</h2>
            <a href="{{ route('languages.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Yeni Dil Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Ad</th>
                        <th class="px-4 py-2 text-left">Slug</th>
                        <th class="px-4 py-2 text-left">Bayrak</th>
                        <th class="px-4 py-2 text-center">Ana Dil</th>
                        <th class="px-4 py-2 text-center">Aktif</th>
                        <th class="px-4 py-2 text-center">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($languages as $language)
                        <tr>
                            <td class="px-4 py-2">{{ $language->id }}</td>
                            <td class="px-4 py-2">{{ $language->name }}</td>
                            <td class="px-4 py-2">{{ $language->slug }}</td>
                            <td class="px-4 py-2 text-lg">{{ $language->flag }}</td>
                            <td class="px-4 py-2 text-center">{{ $language->is_default ? '✔️' : '' }}</td>
                            <td class="px-4 py-2 text-center">{{ $language->status ? '✔️' : '❌' }}</td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('languages.edit', $language->id) }}"
                                   class="text-blue-600 hover:underline">Düzenle</a>

                                <form action="{{ route('languages.destroy', $language->id) }}"
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

                    @if($languages->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center px-4 py-6 text-gray-500">Kayıtlı dil bulunamadı.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
