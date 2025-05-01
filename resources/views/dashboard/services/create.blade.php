@extends('dashboard.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">إضافة خدمة جديدة</h1>
    </div>

    <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label>الأيقونة (مسمى أو كود)</label>
            <input type="text" name="icon" class="w-full border rounded px-4 py-2 mt-1">
        </div>

        <div>
            <label>صورة الخدمة</label>
            <input type="file" name="image" class="w-full border rounded px-4 py-2 mt-1">
        </div>

        @foreach (['ar' => 'العربية', 'en' => 'الإنجليزية'] as $locale => $language)
            <div class="border p-4 rounded">
                <h2 class="font-semibold mb-4">اللغة: {{ $language }}</h2>

                <div class="mb-4">
                    <label>العنوان</label>
                    <input type="text" name="translations[{{ $locale }}][title]"
                        class="w-full border rounded px-4 py-2 mt-1">
                </div>

                <div>
                    <label>الوصف</label>
                    <textarea name="translations[{{ $locale }}][description]" rows="4"
                        class="w-full border rounded px-4 py-2 mt-1"></textarea>
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">حفظ</button>
    </form>
@endsection
