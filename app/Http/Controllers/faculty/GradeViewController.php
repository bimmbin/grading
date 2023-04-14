<?php

namespace App\Http\Controllers\faculty;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GradeViewController extends Controller
{
    public function index($id) {
     
        $loads = Loading::where('profile_id', $id)->get();

        return view('faculty.loadsgrade', [
            'loads' => $loads
        ]);
    }
}
