<?php

namespace App\Http\Controllers\faculty;

use App\Models\Grade;
use App\Models\Profile;
use Shuchkin\SimpleXLSX;
use Defuse\Crypto\Crypto;
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

        // $teeex = 'this is encrioption1';
        // $key = enkrip($teeex);
        // $output = dekrip($key);
        // dd($output);
        $key = env('APP_KEY');


        foreach ($gradesData as $gradeData) {

            $profile = Profile::select('id')->where('studentno', $gradeData['studentno'])->first();

            // dd($profile->id);
            $grades = Grade::firstOrNew([
                'loading_id' => $gradeData['loading_id'], 
                'profile_id' => $profile->id, 
            ], [
                'prelim' => enkrip($gradeData['prelim'], $key),
                'midterm' => enkrip($gradeData['midterm'], $key),
                'finals' => enkrip($gradeData['finals'], $key),
                'fg' => enkrip($gradeData['fg'], $key),
                'ng' => enkrip($gradeData['ng'], $key),
                'remarks' => enkrip($gradeData['remarks'], $key),
            ]);

            if (!$grades->exists) {
                $grades->save();
            }
    
        }
       
        // dd($filtered);

        return redirect()->route('faculty.grades-view', $request->loading_id);
    }
}
