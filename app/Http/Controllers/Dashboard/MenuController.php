<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuTranslation;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('translations')->get();
        return view('dashboard.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('dashboard.menus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string|max:255',
        ]);

        $menu = Menu::create([
            'url' => $validated['url'],
        ]);

        foreach ($validated['translations'] as $locale => $data) {
            MenuTranslation::create([
                'menu_id' => $menu->id,
                'locale' => $locale,
                'name' => $data['name'],
            ]);
        }

        return redirect()->route('dashboard.menus.index')->with('success', 'تمت إضافة الرابط بنجاح');
    }

    public function edit(Menu $menu)
    {
        $menu->load('translations');
        return view('dashboard.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'translations' => 'required|array',
            'translations.*.name' => 'required|string|max:255',
        ]);

        $menu->update([
            'url' => $validated['url'],
        ]);

        foreach ($validated['translations'] as $locale => $data) {
            $menu->translations()->updateOrCreate(
                ['locale' => $locale],
                ['name' => $data['name']]
            );
        }

        return redirect()->route('dashboard.menus.index')->with('success', 'تم تعديل الرابط بنجاح');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('dashboard.menus.index')->with('success', 'تم حذف الرابط بنجاح');
    }
}
