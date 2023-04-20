<?php

namespace App\Http\Controllers\faculty;

use App\Models\Grade;
use App\Models\Loading;
use App\Models\Profile;
use Shuchkin\SimpleXLSX;
use Defuse\Crypto\Crypto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

require_once app_path().'/helpers.php';

class FacultyGradeController extends Controller
{
    public function store(Request $request) {
        
        $students = SimpleXLSX::parse($request->file);

        //checks if its the right format
        $cellHeader = $students->rows(5, 1);
                
        if (empty($students->rows(5, 1)) ||
            
            !(
            $cellHeader[0][0] == 'CNT' && 
            $cellHeader[0][1] == 'STD NUMBER' &&
            $cellHeader[0][2] == 'NAME OF STUDENTS' &&
            $cellHeader[0][3] == 'SECTION' &&
            $cellHeader[0][4] == 'P' &&
            $cellHeader[0][5] == 'M' &&
            $cellHeader[0][6] == 'F' &&
            $cellHeader[0][7] == 'F.G.' &&
            $cellHeader[0][8] == 'N.G.' &&
            $cellHeader[0][9] == 'REMARKS'
            )) {
                return redirect()->route('faculty.loads', Auth::user()->profile->id)
                ->with([
                    'message' => 'Wrong format',
                    'message2' => 'Note: Make sure you upload the grading sheet excel'
                ]);
        } 

        //remove sheets that starts with CS
        $filteredArray = collect($students->sheetnames())->reject(function ($item) {
            return strpos($item, 'CS -') === 0;
        })->toArray();


        
        $iterates = 0;
        foreach ($filteredArray as $i => $array ) {
            
            if ($iterates > 4) {

               
                

                // $string = "BSCS 2B-CSA 103";
                $parts = explode("-", $array);     
         
                $section = $parts[0];
                $subject_code = $parts[1];

                $loading = Loading::whereHas('section', function ($query) use ($section) {
                    $query->where('section_name', $section);
                })->whereHas('subject', function ($query) use ($subject_code) {
                    $query->where('subject_code', $subject_code);
                })->first();

                // dd(!$loading);
                if (!$loading) {
                    return redirect()->route('faculty.loads', Auth::user()->profile->id)
                    ->with([
                        'message' => $section . ' ' . $subject_code. " loads doesn't exist",
                        'message2' => 'Note: Make sure you have the correct loadings in your grading sheet'
                    ]);
                    
                    }
           
                $gradesData = [];
       
                $iterate = 0;
                foreach ($students->rows($i, 0) as $student) {
                    //check if student number is empty, then proceeds to next loop
                    if (empty($student[1])) {
                        continue;
                    }

                    if ($iterate != 0) {
                   
                 
                        $gradesData[] = [
                            'loading_id' => $loading->id,
                            'studentno' => $student[1],
                            'prelim' => round($student[4]* 100),
                            'midterm' => round($student[5]* 100),
                            'finals' => round($student[6]* 100),
                            'fg' => round($student[7]* 100),
                            'ng' => $student[8],
                            'remarks' => $student[9],
                        ];
                    }
                    $iterate++;
                }

                // dd($gradesData);
                // $teeex = 'this is encrioption1';
                // $key = enkrip($teeex);
                // $output = dekrip($key);
                // dd($output);
                $key = env('APP_KEY');

                // dd($gradesData);
                foreach ($gradesData as $gradeData) {

                   
                    $profile = Profile::select('id')->where('studentno', $gradeData['studentno'])->first();
                    if (!$profile) {
                        return redirect()->route('faculty.loads', Auth::user()->profile->id)
                        ->with([
                        'message' => 'Student with student no. ' . $gradeData['studentno'] . "  doesn't exist in the system",
                        'message2' => 'Retrieved from ' . $section . '-' . $subject_code . ' worksheet',
                        'message3' => 'Note: Make sure you have the correct student number in your grading sheet that was mentioned above'
                    ]);
                    }
                    // dd($gradeData);
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
            }
            $iterates++;
        }
       
        // dd($filteredArray);


        
       
        // dd($filtered);

        return redirect()->route('faculty.loads-grades', Auth::user()->profile->id);
    }
}
