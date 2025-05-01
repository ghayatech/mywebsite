@extends('dashboard.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">تعديل رابط</h1>
    </div>

    <form action="{{ route('dashboard.menus.update', $menu) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label>الرابط URL</label>
            <input type="text" name="url" value="{{ old('url', $menu->url) }}"
                class="w-full border rounded px-4 py-2 mt-1">
        </div>

        @foreach (['ar' => 'العربية', 'en' => 'الإنجليزية'] as $locale => $language)
            <div class="border p-4 rounded">
                <h2 class="font-semibold mb-4">{{ $language }}</h2>

                @php
                    $translation = $menu->translations->firstWhere('locale', $locale);
                @endphp

                <div>
                    <label>نص الرابط</label>
                    <input type="text" name="translations[{{ $locale }}][name]"
                        value="{{ old('translations.' . $locale . '.name', $translation?->name) }}"
                        class="w-full border rounded px-4 py-2 mt-1">
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">تحديث</button>
    </form>
@endsection
