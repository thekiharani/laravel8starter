<?php

namespace App\Http\Controllers;

use App\Models\BloodPressure;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BPController extends Controller
{
    public function index(Request $request)
    {
        $bp = BloodPressure::latest('created_at')->paginate(120000)->groupBy(function ($p) {
            return $p->created_at->format('M, Y');
        });
        $days = [];
        $rates = [];
        $systolic = [];
        $diastolic = [];

        foreach ($bp as $kay => $p) {
            $days[] = $kay;
            $rates[] = $p->pluck('rate')->avg();
            $systolic[] = $p->pluck('systolic')->avg();
            $diastolic[] = $p->pluck('diastolic')->avg();
        }

        return view('bp')->with([
            'days' => json_encode($days),
            'rates' => json_encode($rates),
            'systolic' => json_encode($systolic),
            'diastolic' => json_encode($diastolic)
        ]);
    }
}
