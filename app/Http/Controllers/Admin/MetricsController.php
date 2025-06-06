<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetricsController extends Controller
{
    public function index(){
        $countries = Country::where('active', 1)->get();
        $years = Invitation::select(DB::raw("DATE_FORMAT(date, '%Y') as year"))
            ->where('date', '!=', null)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        return view('admin.metrics.index', [
            'countries' => $countries,
            'years' => $years
        ]);
    }
}
