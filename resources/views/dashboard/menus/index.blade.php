@extends('dashboard.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">إدارة قائمة الموقع</h1>
        <a href="{{ route('dashboard.menus.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            إضافة رابط جديد
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">النص ({{ app()->getLocale() }})</th>
                    <th class="px-4 py-2 border">الرابط URL</th>
                    <th class="px-4 py-2 border">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $menu->translation()?->name }}</td>
                        <td class="px-4 py-2 border">{{ $menu->url }}</td>
                        <td class="px-4 py-2 border flex justify-center gap-2">
                            <a href="{{ route('dashboard.menus.edit', $menu) }}"
                                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">تعديل</a>
                            <form action="{{ route('dashboard.menus.destroy', $menu) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
