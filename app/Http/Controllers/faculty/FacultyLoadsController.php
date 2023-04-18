<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Loading;

class FacultyLoadsController extends Controller
{
    public function index($id) {
     
        $loads = Loading::where('profile_id', $id)->get();

        $allLoadsHaveGrades = $loads->every(function ($loading) {
            return $loading->grade->count() > 0;
        });
        // dd($allLoadsHaveGrades);
        return view('faculty.loads', [
            'loads' => $loads,
            'allLoadsHaveGrades' => $allLoadsHaveGrades
        ]);
    }

}
