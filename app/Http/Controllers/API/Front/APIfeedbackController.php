<?php

namespace App\Http\Controllers\API\Front;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class APIfeedBackController extends Controller
{
    public function showFeedback()
    {
        return response()->json([
            'message' => 'This is the feedback page.',
        ]);
    }

    public function storeFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'feedback_by' => 'required',
            'feedback_description' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->feedback_by = $validatedData['feedback_by'];
        $feedback->feedback_description = $validatedData['feedback_description'];
        $feedback->user_id = auth()->user()->id;
        $feedback->created_at = now();
        $feedback->updated_at = now();
        $feedback->save();

        return response()->json([
            'message' => 'Feedback has been sent.',
            'data' => $feedback
        ], 201);
    }
}
