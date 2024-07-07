<?php

namespace App\Http\Controllers\API\Back;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class APIbackreportController extends Controller
{
    public function storeReport(Request $request)
    {
        $report = new Report();

        $report->report_by = $request->input('report_by');
        $report->report_date = $request->input('report_date');

        if ($request->input('incident_type') === 'Other') {
            $report->incident_type = $request->input('incident_type_other');
        } else {
            $report->incident_type = $request->input('incident_type');
        }

        $report->date_incident = $request->input('date_incident');
        $report->province = $request->input('province');
        $report->incident_location = $request->input('incident_location');
        $report->incident_description = $request->input('incident_description');
        $report->lat = $request->input('lat');
        $report->long = $request->input('long');
        $report->report_status = $request->input('report_status');

        if ($request->hasFile('report_image')) {
            $file = $request->file('report_image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('public/report_image'), $fileName);
            $report->report_image = $fileName;
        }

        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Report created successfully!',
            'data' => $report
        ], 201);
    }

    public function showNewReport()
    {
        $newReports = Report::where('report_status', 'pending')->get();

        return response()->json([
            'success' => true,
            'data' => $newReports
        ], 200);
    }

    public function showCompleteReport()
    {
        $completeReports = Report::where('report_status', 'completed')->get();

        return response()->json([
            'success' => true,
            'data' => $completeReports
        ], 200);
    }

    public function showOngoingReport()
    {
        $ongoingReports = Report::where('report_status', 'progress')->get();

        return response()->json([
            'success' => true,
            'data' => $ongoingReports
        ], 200);
    }

    public function showReport()
    {
        $reports = DB::table('report')->get();

        if ($reports->isEmpty()) {
            return response()->json([
                'message' => 'No reports found'
            ], 404); 
        }

        return response()->json([
            'success' => true,
            'data' => $reports
        ], 200);
    }

    public function viewReport($id)
    {
        $report = Report::find($id);

        if ($report) {
            return response()->json([
                'success' => true,
                'data' => $report
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Report not found'
            ], 404);
        }
    }

    public function editReport($id)
    {
        $report = Report::find($id);

        if ($report) {
            return response()->json([
                'success' => true,
                'data' => $report
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Report not found'
            ], 404);
        }
    }

    public function updateReport(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $report->report_by = $request->input('report_by');
        $report->report_date = $request->input('report_date');

        if ($request->input('incident_type') === 'Other') {
            $report->incident_type = $request->input('incident_type_other');
        } else {
            $report->incident_type = $request->input('incident_type');
        }

        $report->date_incident = $request->input('date_incident');
        $report->province = $request->input('province');
        $report->incident_location = $request->input('incident_location');
        $report->incident_description = $request->input('incident_description');
        $report->lat = $request->input('lat');
        $report->long = $request->input('long');
        $report->report_status = $request->input('report_status');

        if ($request->hasFile('report_image')) {
            $file = $request->file('report_image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('public/report_image'), $fileName);
            $report->report_image = $fileName;
        } elseif ($request->has('remove_image')) {
            if ($report->report_image && file_exists(public_path($report->report_image))) {
                unlink(public_path($report->report_image));
            }
            $report->report_image = null;
        }

        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Report updated successfully!',
            'data' => $report
        ], 200);
    }

    public function deleteReport($id)
    {
        $report = Report::find($id);

        if ($report) {
            $report->delete();
            return response()->json([
                'success' => true,
                'message' => 'Report deleted successfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Report not found'
            ], 404);
        }
    }

    public function showMap()
    {
        return response()->json([
            'success' => true,
            'message' => 'Map data here'
        ], 200);
    }

    public function showReportsByProvince($province)
    {
        $provinceMapping = [
            'banteaymeanchey' => 'Banteay Meanchey',
            'banteay meanchey' => 'Banteay Meanchey',
            'banteay-meanchey' => 'Banteay Meanchey',
            'banteaymeangchey' => 'Banteay Meanchey',
            'banteaymengchey' => 'Banteay Meanchey',
            'battambang' => 'Battambang',
            'battamban' => 'Battambang',
            'batambang' => 'Battambang',
            'batamban' => 'Battambang',
            'battambung' => 'Battambang',
            'kampongcham' => 'Kampong Cham',
            'kampong cham' => 'Kampong Cham',
            'kampong-cham' => 'Kampong Cham',
            'kampongchame' => 'Kampong Cham',
            'kampongchhnang' => 'Kampong Chhnang',
            'kampong chhnang' => 'Kampong Chhnang',
            'kampong-chhnang' => 'Kampong Chhnang',
            'kampongchnang' => 'Kampong Chhnang',
            'kampong chnang' => 'Kampong Chhnang',
            'kampong-chang' => 'Kampong Chhnang',
            'kampongspeu' => 'Kampong Speu',
            'kampong speu' => 'Kampong Speu',
            'kampong-speu' => 'Kampong Speu',
            'kampongspue' => 'Kampong Speu',
            'kampongthom' => 'Kampong Thom',
            'kampong thom' => 'Kampong Thom',
            'kampong-thom' => 'Kampong Thom',
            'kampongthum' => 'Kampong Thom',
            'kampong thum' => 'Kampong Thom',
            'kampong-thum' => 'Kampong Thom',
            'kampongthoum' => 'Kampong Thom',
            'kampongthomme' => 'Kampong Thom',
            'kampong thomme' => 'Kampong Thom',
            'kampong tum' => 'Kampong Thom',
            'kampong tom' => 'Kampong Thom',
            'kampong-tom' => 'Kampong Thom',
            'kampot' => 'Kampot',
            'kamput' => 'Kampot',
            'kompot' => 'Kampot',
            'kandal' => 'Kandal',
            'kandall' => 'Kandal',
            'kandale' => 'Kandal',
            'kohkong' => 'Koh Kong',
            'koh kong' => 'Koh Kong',
            'koh-kong' => 'Koh Kong',
            'kokong' => 'Koh Kong',
            'kratie' => 'Kratié',
            'kraty' => 'Kratié',
            'krache' => 'Kratié',
            'krati' => 'Kratié',
            'mondulkiri' => 'Mondulkiri',
            'mondulkirii' => 'Mondulkiri',
            'mondulkir' => 'Mondulkiri',
            'mondulkiry' => 'Mondulkiri',
            'oddarmeanchey' => 'Oddar Meanchey',
            'oddar meanchey' => 'Oddar Meanchey',
            'oddar-meanchey' => 'Oddar Meanchey',
            'odarmeangchey' => 'Oddar Meanchey',
            'odarmeanchey' => 'Oddar Meanchey',
            'pailin' => 'Pailin',
            'pailine' => 'Pailin',
            'pailinn' => 'Pailin',
            'preahsiemreap' => 'Preah Sihanouk',
            'preah sihanouk' => 'Preah Sihanouk',
            'preah-sihanouk' => 'Preah Sihanouk',
            'preahsianouk' => 'Preah Sihanouk',
            'preah-sianouk' => 'Preah Sihanouk',
            'preahvihear' => 'Preah Vihear',
            'preah vihear' => 'Preah Vihear',
            'preah-vihear' => 'Preah Vihear',
            'preahvihar' => 'Preah Vihear',
            'preahvichear' => 'Preah Vihear',
            'pursat' => 'Pursat',
            'ratanakiri' => 'Ratanakiri',
            'ratanakiry' => 'Ratanakiri',
            'ratanakirie' => 'Ratanakiri',
            'ratanakirii' => 'Ratanakiri',
            'ratanakir' => 'Ratanakiri',
            'siemreap' => 'Siem Reap',
            'siem reap' => 'Siem Reap',
            'siem-reap' => 'Siem Reap',
            'stungtreng' => 'Stung Treng',
            'stung treng' => 'Stung Treng',
            'stung-treng' => 'Stung Treng',
            'svayrieng' => 'Svay Rieng',
            'svay rieng' => 'Svay Rieng',
            'svay-rieng' => 'Svay Rieng',
            'takeo' => 'Takeo',
            'tbongkhmum' => 'Tbong Khmum',
            'tbong khmum' => 'Tbong Khmum',
            'tbong-khmum' => 'Tbong Khmum',
            'phnompenh' => 'Phnom Penh',
            'phnom penh' => 'Phnom Penh',
            'phnom-penh' => 'Phnom Penh',
            'preyveng' => 'Prey Veng',
            'prey veng' => 'Prey Veng',
            'prey-veng' => 'Prey Veng',
            'krongkep' => 'Krong Kep',
            'krong kep' => 'Krong Kep',
            'krong-kep' => 'Krong Kep'
        ];

        $normalizedProvince = strtolower(str_replace([' ', '-'], '', $province));
        $standardizedProvince = $provinceMapping[$normalizedProvince] ?? $province;

        $reports = Report::whereRaw('LOWER(province) = ?', [strtolower($standardizedProvince)])->get();

        return response()->json([
            'success' => true,
            'data' => $reports
        ], 200);
    }

    public function searchReports(Request $request)
    {
        $search = $request->input('search');
        $reports = Report::where('incident_type', 'like', '%' . $search . '%')
            ->orWhere('province', 'like', '%' . $search . '%')
            ->orWhere('incident_location', 'like', '%' . $search . '%')
            ->orWhere('incident_description', 'like', '%' . $search . '%')
            ->orWhere('report_by', 'like', '%' . $search . '%')
            ->paginate(10);
        return response()->json($reports);
    }

}