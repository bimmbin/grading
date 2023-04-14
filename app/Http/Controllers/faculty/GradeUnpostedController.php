<?php

namespace App\Http\Controllers\faculty;

use App\Models\Grade;
use App\Models\Loading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


require_once app_path().'/helpers.php';

class GradeUnpostedController extends Controller
{
    public function index($id) {

        $loading = Loading::findOrFail($id); 
        $grades = Grade::whereRelation('loading', 'id', $id)->get();


       
        $key = env('APP_KEY');
        $decryptedgrades = [];
        foreach ($grades as $data) {
            $decryptedgrades[] = [
                "id" => $data->id,
                "loading_id" => $data->id,
                "profile_id" => $data->profile_id,
                "prelim" => dekrip($data->prelim, $key),
                "midterm" => dekrip($data->midterm, $key),
                "finals" => dekrip($data->finals, $key),
                "fg" => dekrip($data->fg, $key),
                "ng" => dekrip($data->ng, $key),
                "remarks" => dekrip($data->remarks, $key),
                "status" => "unposted"
            ];
        }


        return view('faculty.gradeunposted', [
            'loading' => $loading,
            'grades' => $grades,
            'decryptedgrades' => $decryptedgrades,
        ]);
    } 
}
