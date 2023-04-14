<?php

namespace App\Http\Controllers\faculty;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradePostedController extends Controller
{
    public function store($id) {
        $loading = Loading::findOrFail($id);

        $loading->status = 'posted';
        $loading->save();

        return redirect()->back();
    }
}
