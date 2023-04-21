<?php

namespace App\Http\Controllers\admin;

use App\Models\Loading;
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

    public function requestchange() {

        $faculties = Profile::has('loading.requestchange')->distinct()->get();

        // dd($faculties);
        // dd($faculties);
        return view('admin.requestchange', [
            'faculties' => $faculties
        ]);
    }
    
    public function requestList($id) {

        $profile = Profile::findOrFail($id);

        $loading = Loading::has('requestchange')->get();

        // dd($loading);
        // dd($faculties);
        return view('admin.request-list', [
            'profile' => $profile,
            'loadings' => $loading
        ]);
    }
}
