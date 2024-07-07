<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Flasher\Toastr\Prime\ToastrInterface;

class ReportController extends Controller
{
    //

    public function showForm()
    {
        return view('reportForm.report_form');
    }

    public function storeForm(Request $request)
    {


        // Validate the request data
        $this->validate($request, [
            'report_by' => 'required',
            'report_date' => 'required|date',
            'incident_type' => 'required',
            'date_incident' => 'required|date',
            'province' => 'required',
            'incident_location' => 'required',
            'incident_description' => 'required',
            'other_crime_description' => 'required_if:incident_type,other',
            'lat' => 'required|numeric',
            'long' => 'required|numeric'
        ]);

        // Create a new report object
        $report = new Report();
        $report->incident_type = $request->incident_type;
        if($request->incident_type == 'other'){
            $report->incident_type = $request->other_crime_description;
        }

        // Assign values to the report object
        $report->report_by = $request->report_by;
        $report->report_date = $request->report_date;
        // $report->incident_type = $request->incident_type;
        $report->date_incident = $request->date_incident;
        $report->province = $request->province;
        $report->incident_location = $request->incident_location;
        $this->validate($request, [

        ]);
        $report->incident_description = $request->incident_description;

        $report->lat = $request->lat;
        $report->long = $request->long;

        // Check if the request has an image



        if($request->has('report_image')){
            $images = $request->file('report_image');
            foreach($images as $image){
                $extension = $image->getClientOriginalExtension();
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if(in_array($extension, $allowedExtensions)){
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('report_image'), $image_name);
                    $report->report_image .= $image_name . ',';
                }
            }
            $report->report_image = rtrim($report->report_image, ',');
        }




        $report->report_status = 'pending';
        $report->created_at = now();

        // Save the report to the database
        $report->save();



        // Redirect to the success page
        return redirect()->back()->with('success', 'Form Reported successfully');
    }
}
