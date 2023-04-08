<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Profile;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterStudentController extends Controller
{
    public function registerStudent(Request $request)
    {

        $sections = Section::all();

        $secsyon = [];
        foreach ($sections as $section) {
            $secsyon[] = [
                'section_id' => $section->id,
                'section_name' => $section->section_name,
            ];
        }

        $ran = [];

        foreach ($request->studentno as $i => $studentnumber) {

            $ran[] = [
                'studentno' => $studentnumber,
                'firstname' => $request->firstname[$i],
                'lastname' => $request->lastname[$i],
                'middlename' => $request->middlename[$i],
                'sex' => $request->sex[$i],
                'year' => $request->year[$i],
                'course' => $request->course[$i],
                'section' => $request->section[$i],
            ];
        }

        

        // dd($secsyon);

        $filtered = collect($ran)
            ->filter(function ($ran) {
                return $ran['course'] == 'BSCS';
            })
            ->map(function ($ran) {
                return [
                    'studentno' => $ran['studentno'],
                    'firstname' => $ran['firstname'],
                    'lastname' => $ran['lastname'],
                    'middlename' => $ran['middlename'],
                    'sex' => $ran['sex'],
                    'year' => $ran['year'],
                    'course' => $ran['course'],
                    'section' => $ran['section'],
                ];
            });

        // dd($filtered);

        $filtered->each(function ($data) {


            $user = User::firstOrNew(['username' => $data['firstname'] . $data['studentno']], [
                'password' => Hash::make($data['studentno']),
                'role' => 'student',
            ]);


            if (!$user->exists) {
                $user->save();
            }

            $section = Section::select('id')->where('section_name', $data['section'])->first();

            // dd($section->id);
            $userprofile = Profile::firstOrNew(['user_id' => $user->id], [
                'studentno' => $data['studentno'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' =>$data['middlename'],
                'sex' => $data['sex'],
                'year' => $data['year'],
                'course' => $data['course'],
                'section_id' => $section->id,
            ]);

            if (!$userprofile->exists) {
                $userprofile->save();
            }
        });


        // dd($data['studentno']);


        return redirect()->route('admin.studentlist');
    }
}
