<?php

namespace App\Http\Controllers\student;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentGradeController extends Controller
{
    public function index() {
        
        $grades = Grade::where('profile_id', Auth::user()->profile->id)->get();
     
        return view('student.studentgrade', [
            'grades' => $grades
        ]);
    }
}
