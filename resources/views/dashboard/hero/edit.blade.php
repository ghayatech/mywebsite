@extends('dashboard.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-6">تعديل قسم البطل (Hero Section)</h2>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex space-x-4 rtl:space-x-reverse mb-6">
            <button type="button" onclick="showTab('ar')"
                class="tab-button bg-blue-500 text-white px-4 py-2 rounded">العربية</button>
            <button type="button" onclick="showTab('en')" class="tab-button bg-gray-200 px-4 py-2 rounded">English</button>
        </div>

        {{-- العربية --}}
        <div class="tab-content" id="tab-ar">
            <x-hero-form-fields :hero="$heroAr" locale="ar" />
        </div>

        {{-- الإنجليزية --}}
        <div class="tab-content hidden" id="tab-en">
            <x-hero-form-fields :hero="$heroEn" locale="en" />
        </div>

        <div class="col-span-2">
            <label>فيديو الخلفية (mp4 فقط)</label>
            <input type="file" name="video_url" class="w-full border px-4 py-2 rounded">
        </div>



        <div class="mt-6">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                💾 حفظ التغييرات
            </button>
        </div>

    </form>

    <script>
        function showTab(lang) {
            document.querySelectorAll('.tab-content').forEach(div => div.classList.add('hidden'));
            document.getElementById('tab-' + lang).classList.remove('hidden');

            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('bg-blue-500', 'text-white');
                btn.classList.add('bg-gray-200');
            });

            const clickedBtn = document.querySelector('[onclick="showTab(\'' + lang + '\')"]');
            clickedBtn.classList.remove('bg-gray-200');
            clickedBtn.classList.add('bg-blue-500', 'text-white');
        }

        // افتراضيًا أظهر التبويب العربي
        window.onload = function() {
            showTab('ar');
        }
    </script>
@endsection
