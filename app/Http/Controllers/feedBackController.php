<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class feedBackController extends Controller
{
    public function showFeedback()
    {
        return view('feedback.feedback');
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'feedback_by' => 'required',
            'feedback_description' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->feedback_by = $request->feedback_by;
        $feedback->feedback_description = $request->feedback_description;
        $feedback->user_id = auth()->user()->id;
        $feedback->created_at = now();
        $feedback->updated_at = now();
        $feedback->save();

        return redirect()->route('show.feedback');
    }
}
