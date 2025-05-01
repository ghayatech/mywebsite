@extends('dashboard.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">الخدمات</h1>
        <a href="{{ route('dashboard.services.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">إضافة خدمة جديدة</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($services as $service)
            <div class="border rounded p-4 flex flex-col items-center text-center">
                @if ($service->image)
                    <img src="{{ asset($service->image) }}" alt="Service Image" class="h-24 mb-4 object-cover">
                @endif
                <div class="text-4xl mb-2">{{ $service->icon }}</div>
                <h2 class="font-bold text-lg mb-2">{{ $service->translation()?->title ?? 'لا يوجد عنوان' }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($service->translation()?->description, 100) }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('dashboard.services.edit', $service) }}"
                        class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">تعديل</a>
                    <form action="{{ route('dashboard.services.destroy', $service) }}" method="POST"
                        onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">حذف</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
