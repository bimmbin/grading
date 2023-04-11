<?php

namespace App\Http\Controllers\admin;

use App\Models\Loading;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoadsController extends Controller
{
    public function index($id) {

        $faculty = Profile::findorFail($id);

        $loads = Loading::whereRelation('profile', 'id', $id)->get();


        $subjects = Subject::all();
        $sections = Section::all();
        // dd($faculty);
        return view('admin.viewloads', [
            'loads' => $loads,
            'faculty' => $faculty,
            'subjects' => $subjects,
            'sections' => $sections
        ]);
    }

    public function store(Request $request) {
        // dd($request);

        $load = Loading::firstOrNew([
            'profile_id' => $request->faculty_id,
            'section_id' => $request->section_id,
            'subject_id' => $request->subject_id,
            'status' => 'unposted'
        ]);

        if (!$load->exists) {
            $load->save();
        }

        return redirect()->back();
    }
}
