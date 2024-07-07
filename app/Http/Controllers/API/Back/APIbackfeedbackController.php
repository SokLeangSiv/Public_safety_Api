<?php

namespace App\Http\Controllers\API\Back;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class APIbackfeedbackController extends Controller
{

    public function Feedback_table()
    {
        $feedbacks = DB::table('feedback')->get();

        if ($feedbacks->isEmpty()) {
            return response()->json([
                'message' => 'No Feedback found'
            ], 404); 
        }

        return response()->json($feedbacks);
    }

    public function showForm()
    {
        return response()->json([
            'message' => 'Feedback has been shown!',
        ], 201);
    }

    public function saveFeedback(Request $request)
    {
        $request->validate([
            'feedback_by' => 'required|max:255',
            'feedback_description' => 'required',
        ]);

        $feedback = Feedback::create([
            'feedback_by' => $request->feedback_by,
            'feedback_description' => $request->feedback_description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback created successfully!',
            'data' => $feedback
        ], 201);
    }

    public function feedbackTable()
    {
        $feedbacks = DB::table('feedback')->get();

        return response()->json([
            'success' => true,
            'data' => $feedbacks
        ], 200);
    }

    public function viewFeedback($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['success' => false, 'message' => 'Feedback not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $feedback
        ], 200);
    }

    public function editFeedback()
    {
        return response()->json([
            'message' => 'Feedback has been shown!',
        ], 201);
    }

    public function updateFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback_by' => 'required|max:255',
            'feedback_description' => 'required',
        ]);

        $feedback = Feedback::findOrFail($id);

        $feedback->update([
            'feedback_by' => $request->input('feedback_by'),
            'feedback_description' => $request->input('feedback_description'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback updated successfully.',
            'data' => $feedback
        ], 200);
    }

    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['success' => false, 'message' => 'Feedback not found'], 404);
        }

        $feedback->delete();

        return response()->json(['success' => true, 'message' => 'Feedback deleted successfully.'], 200);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['success' => true, 'message' => 'Logged out successfully.'], 200);
    }

    public function searchFeedback(Request $request)
    {
        $search = $request->input('search');
        $feedbacks = Feedback::where('feedback_by', 'like', '%' . $search . '%')->paginate(10);
        return response()->json($feedbacks);
    }

}
