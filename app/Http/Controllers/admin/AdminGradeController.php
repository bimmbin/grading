<?php

namespace App\Http\Controllers\admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGradeController extends Controller
{
    public function grade() {
        
        $submittedGradesCount = Profile::whereHas('loading', function ($query) {
            $query->where('status', 'posted');
        })->distinct()->count();

        // dd($faculties);
        return view('admin.grade', [
            'submittedGradesCount' => $submittedGradesCount
        ]);
    }

    public function submittedGrades() {

        $faculties = Profile::whereHas('loading', function ($query) {
            $query->where('status', 'posted');
        })->distinct()->get();

        // dd($faculties);
        return view('admin.submittedgrades', [
            'faculties' => $faculties
        ]);
    }
}
