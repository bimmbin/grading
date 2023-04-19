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


        $subjects = Subject::get()->sortBy('subject_code');
        $sections = Section::get()->sortBy('section_name');
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

        foreach ($request->section_ids as $section_id) {
            $load = Loading::firstOrNew([
                'profile_id' => $request->faculty_id,
                'section_id' => $section_id,
                'subject_id' => $request->subject_id,
                'status' => 'unposted'
            ]);
    
            if (!$load->exists) {
                $load->save();
            }
        }
       

        return redirect()->back();
    }
}
