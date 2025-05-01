@extends('dashboard.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">إضافة رابط جديد</h1>
    </div>

    <form action="{{ route('dashboard.menus.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label>الرابط URL</label>
            <input type="text" name="url" class="w-full border rounded px-4 py-2 mt-1">
        </div>

        @foreach (['ar' => 'العربية', 'en' => 'الإنجليزية'] as $locale => $language)
            <div class="border p-4 rounded">
                <h2 class="font-semibold mb-4">{{ $language }}</h2>

                <div>
                    <label>نص الرابط</label>
                    <input type="text" name="translations[{{ $locale }}][name]"
                        class="w-full border rounded px-4 py-2 mt-1">
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">حفظ</button>
    </form>
@endsection
