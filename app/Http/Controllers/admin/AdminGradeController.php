<?php

namespace App\Http\Controllers\admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGradeController extends Controller
{
    public function grade() {
        return view('admin.grade');
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
