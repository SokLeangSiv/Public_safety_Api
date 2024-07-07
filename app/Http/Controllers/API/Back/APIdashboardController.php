<?php

namespace App\Http\Controllers\API\Back;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller as Controller;


class APIdashboardController extends Controller
{
    public function totalReports()
    {
        $totalReports = Report::all()->count();
        $newCrimeReports = Report::where('report_status', 'pending')->count();
        $completeCrimeReports = Report::where('report_status', 'completed')->count();
        $ongoingCrimeReports = Report::where('report_status', 'progress')->count();

        return response()->json([
            'totalReports' => $totalReports,
            'newCrimeReports' => $newCrimeReports,
            'completeCrimeReports' => $completeCrimeReports,
            'ongoingCrimeReports' => $ongoingCrimeReports,
        ], 200);
    }
}