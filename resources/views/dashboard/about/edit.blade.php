@extends('dashboard.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">تعديل قسم من نحن</h1>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-2">صورة القسم</label>
                <input type="file" name="image" class="w-full border px-4 py-2 rounded">
                @if ($about && $about->image)
                    <img src="{{ asset($about->image) }}" class="w-32 mt-2">
                @endif
            </div>
        </div>

        <div class="flex space-x-4 mb-4">
            @foreach (config('app.available_locales') as $locale)
                <div class="w-1/2">
                    <h2 class="text-xl font-semibold mb-2">{{ strtoupper($locale) }}</h2>

                    <label>العنوان</label>
                    <input type="text" name="about[{{ $locale }}][title]"
                        value="{{ $about?->translations->firstWhere('locale', $locale)?->title }}"
                        class="w-full mb-2 border px-4 py-2 rounded">

                    <label>الفقرة الأولى</label>
                    <textarea name="about[{{ $locale }}][paragraph1]" class="w-full mb-2 border px-4 py-2 rounded" rows="3">{{ $about?->translations->firstWhere('locale', $locale)?->paragraph1 }}</textarea>

                    <label>الفقرة الثانية</label>
                    <textarea name="about[{{ $locale }}][paragraph2]" class="w-full mb-2 border px-4 py-2 rounded" rows="3">{{ $about?->translations->firstWhere('locale', $locale)?->paragraph2 }}</textarea>
                </div>
            @endforeach
        </div>

        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded">حفظ</button>
    </form>
@endsection
