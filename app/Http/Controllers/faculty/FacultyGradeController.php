<?php

namespace App\Http\Controllers\faculty;

use App\Models\Grade;
use App\Models\Profile;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyGradeController extends Controller
{
    public function store(Request $request) {
        
        $students = SimpleXLSX::parse($request->file);

        $gradesData = [];

        $iterate = 0;
        foreach ($students->rows() as $student) {
            if ($iterate != 0) {
                $gradesData[] = [
                    'loading_id' => $request->loading_id,
                    'studentno' => $student[1],
                    'prelim' => $student[4],
                    'midterm' => $student[5],
                    'finals' => $student[6],
                    'fg' => $student[7],
                    'ng' => $student[8],
                    'remarks' => $student[9],
                ];
            }
            $iterate++;
        }

        // dd($grades);
        foreach ($gradesData as $gradeData) {

            $profile = Profile::select('id')->where('studentno', $gradeData['studentno'])->first();

            // dd($profile->id);
            $grades = Grade::firstOrNew([
                'loading_id' => $gradeData['loading_id'], 
                'prelim' => $gradeData['prelim'], 
                'midterm' => $gradeData['midterm'], 
                'finals' => $gradeData['finals'], 
                'fg' => $gradeData['fg'], 
                'ng' => $gradeData['ng'], 
                'remarks' => $gradeData['remarks'], 
                'status' => 'unposted', 
                'profile_id' => $profile->id, 
            ]);

            if (!$grades->exists) {
                $grades->save();
            }
    
        }
       
        // dd($filtered);

        return redirect()->back();
    }
}
