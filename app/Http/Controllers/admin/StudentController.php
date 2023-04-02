<?php

namespace App\Http\Controllers\admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {  
        $students = Profile::whereRelation('user', 'role', 'student')->paginate(10);

        return view('admin.studentlist', [
            'students' => $students
        ]);
    }
}
