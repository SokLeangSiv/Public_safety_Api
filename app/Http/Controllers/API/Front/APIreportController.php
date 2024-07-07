<?php

namespace App\Http\Controllers\API\Front ;

use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Http\Controllers\Controller as Controller;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Exception;

class APIreportController extends Controller
{

    public function showForm() {
        return response()->json([
            'message' => 'This is the report forms'
        ]);
    }
    
    public function storeForm(Request $request): JsonResponse
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'report_by' => 'required',
                'report_date' => 'required|date',
                'incident_type' => 'required',
                'date_incident' => 'required|date',
                'province' => 'required',
                'incident_location' => 'required',
                'incident_description' => 'required|string ',
                'other_crime_description' => 'required_if:incident_type,other',
                'lat' => 'required|numeric',
                'long' => 'required|numeric',
                'report_image' => 'sometimes|array',
                'report_image.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);

            // Create a new report object
            $report = new Report();
            $report->incident_type = $validatedData['incident_type'];
            if ($validatedData['incident_type'] == 'other') {
                $report->incident_type = $validatedData['other_crime_description'];
            }

            // Assign values to the report object
            $report->report_by = $validatedData['report_by'];
            $report->report_date = $validatedData['report_date'];
            $report->date_incident = $validatedData['date_incident'];
            $report->province = $validatedData['province'];
            $report->incident_location = $validatedData['incident_location'];
            $report->incident_description = $validatedData['incident_description'];
            $report->lat = $validatedData['lat'];
            $report->long = $validatedData['long'];

            if ($request->hasFile('report_image')) {
                $imageNames = [];
                foreach ($request->file('report_image') as $image) {
                    $image_name = $image->hashName();
                    $image->storeAs('report_image', $image_name, 'public');
                    $imageNames[] = $image_name;
                }
                $report->report_image = implode(',', $imageNames);
            }

            $report->report_status = 'pending';
            $report->created_at = now();

            $report->save();

 
            return response()->json([
                'status' => 'success',
                'message' => 'Form Reported successfully',
                'report' => $report
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ],401);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred ',
                'error' => $e->getMessage()
            ], 422);
        }
    }
}