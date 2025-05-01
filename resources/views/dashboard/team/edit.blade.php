@extends('dashboard.layout')

@section('content')
    <form action="{{ route('dashboard.team.member.update', $member->id) }}" method="POST" enctype="multipart/form-data"
        class="mt-2">
        @csrf
        @method('PUT')

        <input type="file" name="image" class="w-full border px-2 py-1 mb-2">

        @foreach (config('app.available_locales') as $locale)
            <input type="text" name="member[{{ $locale }}][name]"
                value="{{ $member->translations->firstWhere('locale', $locale)?->name }}" placeholder="اسم العضو"
                class="w-full mb-2 border px-2 py-1 rounded">
            <input type="text" name="member[{{ $locale }}][position]"
                value="{{ $member->translations->firstWhere('locale', $locale)?->position }}" placeholder="المسمى الوظيفي"
                class="w-full mb-2 border px-2 py-1 rounded">
            <textarea name="member[{{ $locale }}][task_description]" class="w-full mb-2 border px-2 py-1 rounded">{{ $member->translations->firstWhere('locale', $locale)?->task_description }}</textarea>
            <input type="text" name="member[{{ $locale }}][experience]"
                value="{{ $member->translations->firstWhere('locale', $locale)?->experience }}" placeholder="الخبرة"
                class="w-full mb-2 border px-2 py-1 rounded">
        @endforeach

        <button type="submit" class="px-4 py-1 bg-yellow-600 text-white rounded text-sm">تحديث العضو</button>
    </form>

    {{-- فورم الحذف الحالي تحت هذا --}}
    <form action="{{ route('dashboard.team.member.destroy', $member->id) }}" method="POST" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-1 bg-red-600 text-white rounded text-sm">حذف</button>
    </form>
@endsection
