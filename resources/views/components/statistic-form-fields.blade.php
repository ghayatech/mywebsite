@props(['statistic', 'locale'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <input type="hidden" name="statistic[{{ $locale }}][locale]" value="{{ $locale }}">

    <div>
        <label>النص الأساسي (Main Text)</label>
        <input type="text" name="statistic[{{ $locale }}][main_text]"
            value="{{ old("statistic.$locale.main_text", $statistic->main_text) }}"
            class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>العنوان</label>
        <input type="text" name="statistic[{{ $locale }}][title]"
            value="{{ old("statistic.$locale.title", $statistic->title) }}" class="w-full border px-4 py-2 rounded">
    </div>

    <div>
        <label>العداد</label>
        <input type="text" name="statistic[{{ $locale }}][number]"
            value="{{ old("statistic.$locale.number", $statistic->number) }}" class="w-full border px-4 py-2 rounded">
    </div>

</div>
