@extends('dashboard.layout')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">تعديل قسم فريق العمل</h1>

        <form action="{{ route('dashboard.team.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-6">
                @foreach (config('app.available_locales') as $locale)
                    <div class="border p-4 rounded">
                        <h2 class="text-xl mb-2">{{ strtoupper($locale) }}</h2>

                        <label>العنوان</label>
                        <input type="text" name="section[{{ $locale }}][title]"
                            value="{{ $teamSection?->translations->firstWhere('locale', $locale)?->title }}"
                            class="w-full mb-2 border px-4 py-2 rounded">

                        <label>الوصف</label>
                        <textarea name="section[{{ $locale }}][description]" class="w-full mb-2 border px-4 py-2 rounded" rows="3">{{ $teamSection?->translations->firstWhere('locale', $locale)?->description }}</textarea>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded">حفظ القسم</button>
        </form>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">أعضاء الفريق</h2>

        <form action="{{ route('dashboard.team.member.store') }}" method="POST" enctype="multipart/form-data"
            class="mb-8">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label>صورة العضو</label>
                    <input type="file" name="image" class="w-full border px-4 py-2 rounded">
                </div>
                <div>

                </div>
                @foreach (config('app.available_locales') as $locale)
                    <div class="border p-4 rounded">
                        <h2 class="text-xl mb-2">{{ strtoupper($locale) }}</h2>

                        <input type="text" name="member[{{ $locale }}][name]" placeholder="اسم العضو"
                            class="w-full mb-2 border px-4 py-2 rounded">
                        <input type="text" name="member[{{ $locale }}][position]" placeholder="المسمى الوظيفي"
                            class="w-full mb-2 border px-4 py-2 rounded">
                        <textarea name="member[{{ $locale }}][task_description]" placeholder="وصف المهام"
                            class="w-full mb-2 border px-4 py-2 rounded"></textarea>
                        <input type="text" name="member[{{ $locale }}][experience]" placeholder="الخبرة"
                            class="w-full mb-2 border px-4 py-2 rounded">
                    </div>
                @endforeach
            </div>

            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded">إضافة عضو جديد</button>
        </form>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($teamMembers as $member)
                <div class="border p-4 rounded shadow">
                    <form action="{{ route('dashboard.team.member.update', $member->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <img src="{{ asset($member->image) }}" class="w-full h-48 object-cover mb-2">

                        <div class="mb-4">
                            <label>تغيير الصورة (اختياري)</label>
                            <input type="file" name="image" class="w-full mb-2 border px-4 py-2 rounded">
                        </div>

                        @foreach (config('app.available_locales') as $locale)
                            <div class="border p-2 rounded mb-2">
                                <h4 class="text-md font-bold mb-2">{{ strtoupper($locale) }}</h4>

                                <input type="text" name="member[{{ $locale }}][name]"
                                    value="{{ $member->translations->firstWhere('locale', $locale)?->name }}"
                                    placeholder="اسم العضو" class="w-full mb-2 border px-4 py-2 rounded">
                                <input type="text" name="member[{{ $locale }}][position]"
                                    value="{{ $member->translations->firstWhere('locale', $locale)?->position }}"
                                    placeholder="المسمى الوظيفي" class="w-full mb-2 border px-4 py-2 rounded">
                                <textarea name="member[{{ $locale }}][task_description]" class="w-full mb-2 border px-4 py-2 rounded"
                                    placeholder="وصف المهام">{{ $member->translations->firstWhere('locale', $locale)?->task_description }}</textarea>
                                <input type="text" name="member[{{ $locale }}][experience]"
                                    value="{{ $member->translations->firstWhere('locale', $locale)?->experience }}"
                                    placeholder="الخبرة" class="w-full mb-2 border px-4 py-2 rounded">
                            </div>
                        @endforeach

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded text-sm">تحديث العضو</button>
                    </form>

                    <form action="{{ route('dashboard.team.member.destroy', $member->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-1 bg-red-600 text-white rounded text-sm">حذف</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
