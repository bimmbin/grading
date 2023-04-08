<?php

namespace App\Http\Controllers\admin;

use App\Models\Section;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index() {
        return view('admin.subject-section');
    }

    public function store(Request $request) {

        $students = SimpleXLSX::parse($request->file);

        $data = [];

        $iterate = 0;
        foreach ($students->rows() as $student) {
            if ($iterate != 0) {
                $data[] = [
                    'section' => $student[10],
                ];
            }
            $iterate++;
        }
        // dd($data);
        $filtered = collect($data)
        ->unique('section')
        ->map(function ($ran) {
            return [
                'section' => $ran['section'],
                // 'section' => $ran['section'],
            ];
        })->sortBy('section');

        foreach ($filtered as $section) {
            $section = Section::firstOrNew(['section_name' => $section['section']]);

            if (!$section->exists) {
                $section->save();
            }
    
        }
       
        // dd($filtered);

        return redirect()->back();
     
    }
}
