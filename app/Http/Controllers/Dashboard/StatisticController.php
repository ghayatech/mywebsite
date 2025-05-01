<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\StatisticSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatisticController extends Controller
{

    public function index()
    {
        $sections = StatisticSection::with('statistics')->get()->groupBy('locale');
        return view('dashboard.statistic.index', compact('sections'));
    }

    public function updateSection(Request $request)
    {
        foreach ($request->section as $locale => $main_text) {
            StatisticSection::updateOrCreate(
                ['locale' => $locale],
                ['main_text' => $main_text]
            );
        }

        return redirect()->back()->with('success', 'تم تحديث عنوان القسم بنجاح.');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'section_id' => 'required|exists:statistic_sections,id',
            'title' => 'required|string',
            'icon' => 'required|string',
            'number' => 'required|integer',
            'locale' => 'required|string|in:ar,en',
        ]);

        Statistic::create($data);
        return redirect()->back()->with('success', 'تمت إضافة البطاقة بنجاح.');
    }

    public function update(Request $request, $id)
    {
        $stat = Statistic::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'icon' => 'required|string',
            'number' => 'required|integer',
        ]);

        $stat->update($data);
        return redirect()->back()->with('success', 'تم تعديل البطاقة بنجاح.');
    }

    public function destroy($id)
    {
        Statistic::destroy($id);
        return redirect()->back()->with('success', 'تم حذف البطاقة بنجاح.');
    }
}
