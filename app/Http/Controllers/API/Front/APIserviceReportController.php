<?php
namespace App\Http\Controllers\API\Front ;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller as Controller;


class APIserviceReportController extends Controller
{
    
    public function showService(): JsonResponse
    {
        $data = [
            'service' => 'Fire Service',
            'description' => 'Details about the fire service report.',
        ];

        return response()->json($data, 200);
    }

    
    public function showEmergency(): JsonResponse
    {
        $data = [
            'service' => 'Emergency Service',
            'description' => 'Details about the emergency service report.',
        ];

        return response()->json($data, 200);
    }
}