<?php

namespace App\Http\Controllers\faculty;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Models\Requestchange;
use App\Http\Controllers\Controller;

class RemarksController extends Controller
{
    public function store(Request $request) {
        // dd($request);

        // $loading = Loading::findOrFail($request->loading_id);

        $request = Requestchange::firstOrNew([
            'loading_id' => $request->loading_id,
            'remarks' => $request->remarks
        ]);

        if (!$request->exists) {
            $request->save();
        }


        return redirect()->back();
    }
}
