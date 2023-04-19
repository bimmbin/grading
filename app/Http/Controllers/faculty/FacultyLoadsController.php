<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Loading;

class FacultyLoadsController extends Controller
{
    public function index($id) {
     
        $loads = Loading::where('profile_id', $id)->has('grade')->get();

        $loads->load('grade');

        $hasgrade = '';
        // Check if the "posts" relationship has been loaded for all users
        foreach ($loads as $load) {
            if ($load->relationLoaded('grade')) {
                $hasgrade = true;
                
            } else {
                $hasgrade = false;
            }
        }
        // dd($allLoadsHaveGrades);
        return view('faculty.loads', [
            'loads' => $loads,
            'hasgrade' => $hasgrade,
        ]);
    }

}
