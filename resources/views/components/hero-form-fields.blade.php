@props(['hero', 'locale'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <input type="hidden" name="hero[{{ $locale }}][locale]" value="{{ $locale }}">

    <div>
        <label>النص الأساسي (Main Text)</label>
        <input type="text" name="hero[{{ $locale }}][main_text]"
            value="{{ old("hero.$locale.main_text", $hero->main_text) }}" class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>الفقرة الصغيرة</label>
        <input type="text" name="hero[{{ $locale }}][small_paragraph]"
            value="{{ old("hero.$locale.small_paragraph", $hero->small_paragraph) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    <div class="col-span-2">
        <label>وصف</label>
        <textarea name="hero[{{ $locale }}][description]" class="w-full border px-4 py-2 rounded" rows="3">{{ old("hero.$locale.description", $hero->description) }}</textarea>
    </div>

    <div>
        <label>نص زر خدماتنا</label>
        <input type="text" name="hero[{{ $locale }}][services_button_text]"
            value="{{ old("hero.$locale.services_button_text", $hero->services_button_text) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>رابط زر خدماتنا</label>
        <input type="text" name="hero[{{ $locale }}][services_button_link]"
            value="{{ old("hero.$locale.services_button_link", $hero->services_button_link) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>نص زر تواصل معنا</label>
        <input type="text" name="hero[{{ $locale }}][contact_button_text]"
            value="{{ old("hero.$locale.contact_button_text", $hero->contact_button_text) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>رابط زر تواصل معنا</label>
        <input type="text" name="hero[{{ $locale }}][contact_button_link]"
            value="{{ old("hero.$locale.contact_button_link", $hero->contact_button_link) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    {{-- <div class="col-span-2">
        <label>فيديو الخلفية (mp4 فقط)</label>
        <input type="file" name="hero[{{ $locale }}][video_url]" class="w-full border px-4 py-2 rounded">
        @if ($hero->video_url)
            <p class="mt-2 text-sm text-gray-600">الفيديو الحالي: <a href="{{ asset($hero->video_url) }}"
                    target="_blank">عرض</a></p>
        @endif
    </div> --}}



</div>
