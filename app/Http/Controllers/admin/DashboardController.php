<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {  
        return view('admin.dashboard');
    }

    public function sample()
    {  
        return view('admin.sample');
    }
    
    public function previewTable(Request $request)
    {
        $students = SimpleXLSX::parse($request->file);


        $username = array();

        $headings = 0;
        foreach ($students->rows() as $student) {
            if ($headings != 0 && $headings != 1) {
                array_push($username, $student[2].$student[0]);
            }
            $headings++;
        }

        // $users = User::whereIn('identify', array_column($students, 'identify'))->get();

        $exusername = User::select('username')->whereIn('username', $username)->get();

        $exusers = array();
        foreach ($exusername as $exuser) {
            array_push($exusers, $exuser->username);
        }


        return view('admin.tablepreview')->with('students', $students);
    }
}
