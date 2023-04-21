<?php

namespace App\Http\Controllers\faculty;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once app_path().'/helpers.php';

class EditGradeController extends Controller
{
    public function store(Request $request) {
    
        $key = env('APP_KEY');

        $student = Grade::findOrFail($request->id);

        // dd($student);
        // enkrip($request->prelim, $key),
        $student->prelim = enkrip($request->prelim, $key);
        $student->midterm = enkrip($request->midterm, $key);
        $student->finals = enkrip($request->final, $key);
        $student->fg = enkrip($request->fg, $key);
        $student->ng = enkrip($request->ng, $key);
        $student->remarks = enkrip($request->remarks, $key);

        $student->save();

        return redirect()->back();
    }
}
