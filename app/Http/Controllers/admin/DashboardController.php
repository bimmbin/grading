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

        return view('admin.tablepreview')->with('students', $students);
        
    }
}
