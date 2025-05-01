<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::with('translations')->get();
        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'translations' => 'required|array',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.description' => 'required|string',
        ]);

        // حفظ الصورة
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validated['image'] = 'uploads/services/' . $imageName;
        }

        $service = Service::create([
            'icon' => $validated['icon'],
            'image' => $validated['image'] ?? null,
        ]);

        foreach ($validated['translations'] as $locale => $data) {
            ServiceTranslation::create([
                'service_id' => $service->id,
                'locale' => $locale,
                'title' => $data['title'],
                'description' => $data['description'],
            ]);
        }

        return redirect()->route('dashboard.services.index')->with('success', 'تمت إضافة الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        $service->load('translations');
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'translations' => 'required|array',
            'translations.*.title' => 'required|string|max:255',
            'translations.*.description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validated['image'] = 'uploads/services/' . $imageName;
        }

        $service->update([
            'icon' => $validated['icon'],
            'image' => $validated['image'] ?? $service->image,
        ]);

        foreach ($validated['translations'] as $locale => $data) {
            $service->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                ]
            );
        }

        return redirect()->route('dashboard.services.index')->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('dashboard.services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}
