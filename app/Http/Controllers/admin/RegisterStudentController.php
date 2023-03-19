<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterStudentController extends Controller
{
    public function registerStudent(Request $request)
    {
        // $param1 = [];
        // $param2 = [];
        $exStudents = [];
        $studentsprofile = [];

        foreach ($request->studentno as $i => $studentnumber) {

            $ran = microtime() . floor(rand() * 10000);

            $user = User::firstOrNew(['username' => $request->lastname[$i] . $studentnumber], [
                'password' => Hash::make($studentnumber),
                'role' => 'student',
                'identify' => $ran,
            ]);
            
            
            if (!$user->exists) {
                $user->save();
            }

            $userprofile = Profile::firstOrNew(['user_id' => $user->id,], [
                'studentno' => $studentnumber,
                'firstname' => $request->firstname[$i],
                'lastname' => $request->lastname[$i],
                'middlename' => $request->middlename[$i],
                'sex' => $request->sex[$i],
                'year' => $request->year[$i],
                'course' => $request->course[$i],
                'section' => $request->section[$i],
            ]);

            if (!$userprofile->exists) {
                $userprofile->save();
            }
            
        }

        return redirect()->route('dashboard');
    }
}
