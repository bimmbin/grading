<?php

namespace App\Http\Controllers\admin;

use App\Models\Loading;
use Illuminate\Http\Request;
use App\Models\Requestchange;
use App\Http\Controllers\Controller;

class AdminRequestController extends Controller
{
    public function store(Request $request) {
        
        $loading = Loading::findOrFail($request->loading_id);

        $loading->status = 'unposted';
        $loading->save();

        $requestchange = Requestchange::whereRelation('loading', 'id', $request->loading_id)->first();

        $requestchange->delete();

        return redirect()->back();
    }

    public function deny(Request $request) {

        $requestchange = Requestchange::whereRelation('loading', 'id', $request->loading_id)->first();

        $requestchange->delete();

        return redirect()->back();
    }
}
