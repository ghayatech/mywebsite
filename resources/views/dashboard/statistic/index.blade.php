@extends('dashboard.layout')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">قسم الإحصائيات</h1>

        {{-- تحديث main_text لكل لغة --}}
        <form action="{{ route('dashboard.statistics.updateSection') }}" method="POST"
            class="mb-10 space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <h2 class="font-semibold text-lg">تعديل عنوان القسم</h2>
            @foreach (['ar' => 'العربية', 'en' => 'الإنجليزية'] as $locale => $label)
                <div>
                    <label>عنوان القسم ({{ $label }})</label>
                    <input type="text" name="section[{{ $locale }}]"
                        value="{{ $sections[$locale][0]->main_text ?? '' }}" class="w-full border p-2 rounded mt-1">
                </div>
            @endforeach
            <button class="bg-blue-600 text-white px-4 py-2 rounded">تحديث العناوين</button>
        </form>

        {{-- عرض البطاقات لكل لغة --}}
        @foreach ($sections as $locale => $sectionList)
            @php $section = $sectionList[0]; @endphp

            <div class="mb-10 bg-white p-4 rounded shadow">
                <h2 class="font-semibold text-xl mb-4">الإحصائيات ({{ $locale === 'ar' ? 'العربية' : 'الإنجليزية' }})</h2>

                {{-- إضافة بطاقة جديدة --}}
                <form action="{{ route('dashboard.statistics.store') }}" method="POST"
                    class="grid grid-cols-3 gap-4 items-end mb-6">
                    @csrf
                    <input type="hidden" name="section_id" value="{{ $section->id }}">
                    <input type="hidden" name="locale" value="{{ $locale }}">
                    <div>
                        <label>العنوان</label>
                        <input type="text" name="title" class="w-full border p-2 rounded mt-1" required>
                    </div>
                    <div>
                        <label>الايقونة</label>
                        <input type="text" name="icon" class="w-full border p-2 rounded mt-1" required>
                    </div>
                    <div>
                        <label>العدد</label>
                        <input type="number" name="number" class="w-full border p-2 rounded mt-1" required>
                    </div>
                    <button class="bg-green-600 text-white px-4 py-2 rounded">إضافة</button>
                </form>

                {{-- عرض البطاقات --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($section->statistics as $stat)
                        <div class="border p-4 rounded bg-gray-50">
                            <h3 class="text-lg font-bold">{{ $stat->title }}</h3>
                            <p class="text-2xl font-mono my-2">{{ $stat->number }}</p>

                            {{-- تعديل وحذف --}}
                            <form action="{{ route('dashboard.statistics.update', $stat->id) }}" method="POST"
                                class="space-y-2 mb-2">
                                @csrf
                                <div>
                                    <label>عنوان</label>
                                    <input type="text" name="title" value="{{ $stat->title }}"
                                        class="w-full border p-2 rounded">
                                </div>
                                <div>
                                    <label>الايقونة</label>
                                    <input type="text" name="icon" value="{{ $stat->icon }}"
                                        class="w-full border p-2 rounded">
                                </div>
                                <div>
                                    <label>عدد</label>
                                    <input type="number" name="number" value="{{ $stat->number }}"
                                        class="w-full border p-2 rounded">
                                </div>
                                <button class="bg-blue-500 text-white px-4 py-1 rounded">تحديث</button>
                            </form>

                            <form action="{{ route('dashboard.statistics.destroy', $stat->id) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد؟')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">🗑 حذف</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
