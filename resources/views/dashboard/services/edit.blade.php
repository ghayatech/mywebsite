@extends('dashboard.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">تعديل الخدمة</h1>
    </div>

    <form action="{{ route('dashboard.services.update', $service) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label>الأيقونة</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                class="w-full border rounded px-4 py-2 mt-1">
        </div>

        <div>
            <label>صورة الخدمة</label>
            <input type="file" name="image" class="w-full border rounded px-4 py-2 mt-1">
            @if ($service->image)
                <img src="{{ asset($service->image) }}" alt="Current Image" class="h-24 mt-2">
            @endif
        </div>

        @foreach (['ar' => 'العربية', 'en' => 'الإنجليزية'] as $locale => $language)
            @php
                $translation = $service->translations->where('locale', $locale)->first();
            @endphp
            <div class="border p-4 rounded">
                <h2 class="font-semibold mb-4">اللغة: {{ $language }}</h2>

                <div class="mb-4">
                    <label>العنوان</label>
                    <input type="text" name="translations[{{ $locale }}][title]"
                        value="{{ old('translations.' . $locale . '.title', $translation?->title) }}"
                        class="w-full border rounded px-4 py-2 mt-1">
                </div>

                <div>
                    <label>الوصف</label>
                    <textarea name="translations[{{ $locale }}][description]" rows="4"
                        class="w-full border rounded px-4 py-2 mt-1">{{ old('translations.' . $locale . '.description', $translation?->description) }}</textarea>
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">تحديث</button>
    </form>
@endsection
