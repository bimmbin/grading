<?php

namespace App\Http\Controllers\admin;

use App\Models\Section;
use App\Models\Subject;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index() {
        return view('admin.subject-section');
    }

    public function store(Request $request) {

          
        $students = SimpleXLSX::parse($request->file);

        $data = [];

        $iterate = 0;
        foreach ($students->rows() as $student) {
            if ($iterate != 0) {
                $data[] = [
                    'subject_code' => $student[0],
                    'subject_description' => $student[1],
                    'year' => $student[2],
                ];
            }
            $iterate++;
        }

        foreach ($data as $subject) {
            $subject = Subject::firstOrNew([
                'school_year' => $subject['year'], 
                'subject_code' => $subject['subject_code'], 
                'subject_description' => $subject['subject_description'],
            ]);

            if (!$subject->exists) {
                $subject->save();
            }
    
        }
       
        // dd($filtered);

        return redirect()->back();
    }
}
