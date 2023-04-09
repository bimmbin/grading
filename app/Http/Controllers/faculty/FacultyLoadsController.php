<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Loading;

class FacultyLoadsController extends Controller
{
    public function index() {

        $profile = Auth::user()->profile->id;
     
        $loads = Loading::where('profile_id', $profile)->get();

//    dd($loads);
        return view('faculty.loads', [
            'loads' => $loads
        ]);
    }

}
