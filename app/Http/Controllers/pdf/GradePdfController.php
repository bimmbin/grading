<?php

namespace App\Http\Controllers\pdf;

use App\Models\Grade;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
class GradePdfController extends Controller
{
    public function index() {
        return view('pdf.grade');
    }

    public function exportToPDF()
    {
        // $grades = Grade::whereRelation('loading', 'status', 'posted')
        // ->where('profile_id', Auth::user()->profile->id)->get();
        $pdf = PDF::loadView('pdf.grade');
        return $pdf->download('invoice.pdf');
    }
}
