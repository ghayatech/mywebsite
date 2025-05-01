<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroSectionController extends Controller
{
    public function edit()
    {
        $heroAr = HeroSection::where('locale', 'ar')->first() ?? new HeroSection(['locale' => 'ar']);
        $heroEn = HeroSection::where('locale', 'en')->first() ?? new HeroSection(['locale' => 'en']);

        return view('dashboard.hero.edit', compact('heroAr', 'heroEn'));
    }

    public function update(Request $request)
    {
        $locales = ['ar', 'en'];
        $validated = [];

        try {
            foreach ($locales as $locale) {
                $data = $request->input("hero.$locale");

                // $validated = Validator::make($data, [
                //     'main_text' => 'required|string',
                //     'small_paragraph' => 'nullable|string',
                //     'description' => 'nullable|string',
                //     'services_button_text' => 'nullable|string',
                //     'services_button_link' => 'nullable|string',
                //     'contact_button_text' => 'nullable|string',
                //     'contact_button_link' => 'nullable|string',
                //     'video_url' => 'nullable|mimetypes:video/mp4,video/webm,video/ogg|max:20000',
                // ])->validate();

                $hero = HeroSection::where('locale', $locale)->first();
                if (!$hero) {
                    $hero = new HeroSection();
                    $hero->locale = $locale;
                }

                // if ($request->hasFile("hero.$locale.video_url")) {
                //     $file = $request->file("hero.$locale.video_url");
                //     $fileName = time() . '_' . $file->getClientOriginalName();
                //     $destinationPath = public_path('uploads/videos');

                //     if (!file_exists($destinationPath)) {
                //         mkdir($destinationPath, 0777, true);
                //     }

                //     $file->move($destinationPath, $fileName);
                //     $validated['video_url'] = 'uploads/videos/' . $fileName;
                // }

                $validated['main_text'] = $data['main_text'] ?? '';
                $validated['small_paragraph'] = $data['small_paragraph'] ?? '';
                $validated['description'] = $data['description'] ?? '';
                $validated['services_button_text'] = $data['services_button_text'] ?? '';
                $validated['services_button_link'] = $data['services_button_link'] ?? '';
                $validated['contact_button_text'] = $data['contact_button_text'] ?? '';
                $validated['contact_button_link'] = $data['contact_button_link'] ?? '';

                $hero->fill($validated);
                $hero->save();
            }
        } catch (\Throwable $th) {
            var_dump($th);
            exit;
        }

        // الآن التعامل مع الفيديو بشكل مستقل:


        if ($request->hasFile('video_url')) {
            $file = $request->file('video_url');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads/videos');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $fileName);

            HeroSection::whereIn('locale', $locales)->update(['video_url' => 'uploads/videos/' . $fileName]);
        }


        return redirect()->route('dashboard.hero.index')->with('success', 'تم تحديث القسم بنجاح');
    }
}
