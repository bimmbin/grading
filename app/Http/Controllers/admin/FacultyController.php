<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function index() {

        $faculty = Profile::whereRelation('user', 'role', 'faculty')->get();

        // dd($faculty);
        return view('admin.faculty', [
            'faculties' => $faculty
        ]);

        
    }

    public function store(Request $request) {

        // dd($request->lastnadme);


        $user = User::firstOrNew(['username' => $request->lastname . $request->employeeno ], [
            'password' => Hash::make($request->employeeno),
            'role' => 'faculty',
        ]);


        if (!$user->exists) {
            $user->save();
        }

        $userprofile = Profile::firstOrNew(['user_id' => $user->id], [
            'employeeno' => $request->employeeno,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'department' => $request->department
        ]);

        if (!$userprofile->exists) {
            $userprofile->save();
        }

        return redirect()->back();
    }
}
