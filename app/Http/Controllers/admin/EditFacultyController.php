<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditFacultyController extends Controller
{
    public function store(Request $request) {
        // dd($request);

        
        $faculty = Profile::findOrFail($request->id);

        $faculty->employeeno = $request->employeeno;
        $faculty->firstname = $request->firstname;
        $faculty->lastname = $request->lastname;
        $faculty->middlename = $request->middlename;
        $faculty->department = $request->department;
        $faculty->save();


        $facultyUser = User::findOrFail($faculty->user->id);
        $facultyUser->username = $faculty->lastname.$request->employeeno;
        $facultyUser->password = Hash::make($request->employeeno);
        $facultyUser->save();


        return redirect()->back();
    }
}
