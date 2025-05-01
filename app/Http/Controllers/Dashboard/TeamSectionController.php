<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamSection;
use App\Models\TeamSectionTranslation;
use App\Models\TeamMember;
use App\Models\TeamMemberTranslation;

class TeamSectionController extends Controller
{
    public function index()
    {
        $teamSection = TeamSection::with('translations')->first();
        $teamMembers = TeamMember::with('translations')->get();
        return view('dashboard.team.index', compact('teamSection', 'teamMembers'));
    }

    public function update(Request $request)
    {
        $teamSection = TeamSection::first() ?? TeamSection::create([]);

        foreach (config('app.available_locales') as $locale) {
            $data = $request->input('section')[$locale];
            TeamSectionTranslation::updateOrCreate(
                ['team_section_id' => $teamSection->id, 'locale' => $locale],
                ['title' => $data['title'], 'description' => $data['description']]
            );
        }

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function storeMember(Request $request)
    {
        $member = new TeamMember();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'uploads/team/' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/team'), $path);
            $member->image = $path;
        }

        $member->save();

        foreach (config('app.available_locales') as $locale) {
            $data = $request->input('member')[$locale];
            TeamMemberTranslation::create([
                'team_member_id' => $member->id,
                'locale' => $locale,
                'name' => $data['name'],
                'position' => $data['position'],
                'task_description' => $data['task_description'],
                'experience' => $data['experience'],
            ]);
        }

        return redirect()->back()->with('success', 'تم إضافة عضو جديد');
    }

    public function editMember($id)
    {
        $member = TeamMember::findOrFail($id);
        $teamMembers = TeamMember::with('translations')->where($id)->get();

        return view('dashboard.team.edit', compact('member', 'teamMembers'));
    }


    public function updateMember(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }

            $image = $request->file('image');
            $path = 'uploads/team/' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/team'), $path);
            $member->image = $path;
        }

        $member->save();

        foreach (config('app.available_locales') as $locale) {
            $data = $request->input('member')[$locale];
            TeamMemberTranslation::updateOrCreate(
                ['team_member_id' => $member->id, 'locale' => $locale],
                [
                    'name' => $data['name'],
                    'position' => $data['position'],
                    'task_description' => $data['task_description'],
                    'experience' => $data['experience'],
                ]
            );
        }

        return redirect()->back()->with('success', 'تم تحديث بيانات العضو بنجاح');
    }


    public function destroyMember($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();
        return redirect()->back()->with('success', 'تم حذف العضو');
    }
}
