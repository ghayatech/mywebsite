<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\AboutSectionTranslation;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $about = AboutSection::with('translations')->first();
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutSection::first();

        if (!$about) {
            $about = AboutSection::create([]);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'uploads/about/' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/about'), $path);
            $about->update(['image' => $path]);
        }

        foreach (config('app.available_locales') as $locale) {
            $data = $request->input('about')[$locale];
            AboutSectionTranslation::updateOrCreate(
                ['about_section_id' => $about->id, 'locale' => $locale],
                [
                    'title' => $data['title'],
                    'paragraph1' => $data['paragraph1'],
                    'paragraph2' => $data['paragraph2'],
                ]
            );
        }

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }
}
