<?php

namespace App\Http\Controllers\student;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Auth;


require_once app_path().'/helpers.php';

class StudentGradeController extends Controller
{
    public function index() {
        
        // dd(Auth::user()->profile->section->loading->status);
        $grades = Grade::whereRelation('loading', 'status', 'posted')
        ->where('profile_id', Auth::user()->profile->id)->get();
     
        $decryptedgrades = [];

        $key = env('APP_KEY');

        foreach ($grades as $data) {
            $decryptedgrades[] = [
   
                "prelim" => dekrip($data->prelim, $key),
                "midterm" => dekrip($data->midterm, $key),
                "finals" => dekrip($data->finals, $key),
                "fg" => dekrip($data->fg, $key),
                "ng" => dekrip($data->ng, $key),
                "remarks" => dekrip($data->remarks, $key),
            ];
        }
  
                // dd($decryptedgrades);
        return view('student.studentgrade', [
            'grades' => $grades,
            'decryptedgrades' => $decryptedgrades,
        ]);
    }
}
