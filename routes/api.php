<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Front\APIcontactusController;
use App\Http\Controllers\API\Front\APIreportController;
use App\Http\Controllers\API\Front\APIserviceReportController;
use App\Http\Controllers\API\Front\APIfeedBackController;
use App\Http\Controllers\API\Front\APIuserProfileController;
use App\Http\Controllers\API\Front\APIprofileController;
use App\Http\Controllers\API\Front\APIfrontauthController;

use App\Http\Controllers\API\Back\APIbackauthController;
use App\Http\Controllers\API\Back\APIbackcontactusController;
use App\Http\Controllers\API\Back\APIdashboardController;
use App\Http\Controllers\API\Back\APIbackfeedbackController;
use App\Http\Controllers\API\Back\APIproController;
use App\Http\Controllers\API\Back\APIbackprofileController;
use App\Http\Controllers\API\Back\APIbackreportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/APIregister', [APIfrontauthController::class, 'register']);
        Route::post('/APIlogin', [APIfrontauthController::class, 'login']);

Route::middleware('auth:sanctum','prevent.admin.access')->group(function () {

    Route::prefix('users')->group(function() {

        
    
    Route::controller(APIreportController::class)->group(function(){
        Route::get('/reports', 'showForm');
        Route::post('/reports/create', 'storeForm');
    });

    Route::controller(APIcontactusController::class)->group(function(){
        Route::get('/contact-us', 'showContact');
        Route::get('/about-us', 'showAbout');
        Route::post('/contact-us/create', 'storeContact');
    });

    Route::controller(APIserviceReportController::class)->group(function(){
        Route::get('/service/fire', 'showService');
        Route::get('/emergency', 'showEmergency');
    });

    Route::controller(APIfeedBackController::class)->group(function(){
        Route::get('/feedback', 'showFeedback');
        Route::post('/feedback/create', 'storeFeedback');
    });

    Route::controller(APIuserProfileController::class)->group(function(){
        Route::get('/profile', 'showProfile');
        Route::post('/profile/create', 'storeProfile');
        Route::post('/logout', 'logout'); 
    });

} ) ;
})  ;

//Backend API
Route::post('/APIbacklogin', [APIbackauthController::class, 'backlogin']);



Route::middleware('auth:sanctum' ,'admin')->group(function () {

    Route::prefix('admin')->group(function() {

    Route::get('/dashboard', [APIdashboardController::class, 'TotalReports'])->middleware('verified')->name('dashboard');

    Route::get('/feedback', [APIbackfeedbackController::class, 'Feedback_table'])->name('feedback');
    Route::get('view-feedback/{id}', [APIbackfeedbackController::class, 'viewFeedback'])->name('view.feedback');
    Route::get('edit-feedback/{id}', [APIbackfeedbackController::class, 'editFeedback'])->name('edit.feedback');
    Route::post('update-feedback/{id}', [APIbackfeedbackController::class, 'updateFeedback'])->name('update.feedback');
    Route::delete('/feedback/{id}', [APIbackfeedbackController::class, 'deleteFeedback'])->name('feedback.delete');
    Route::get('feedback-form', [APIbackfeedbackController::class, 'showForm'])->name('feedback.form');
    Route::post('/save-feedback', [APIbackfeedbackController::class, 'saveFeedback'])->name('feedback.save');
    Route::get('/feedback/search', [APIbackfeedbackController::class, 'searchFeedback'])->name('feedback.search');


    Route::get('/contact-us', [APIbackcontactusController::class, 'ContactUs_table'])->name('contact_us_table');
    Route::get('view-contact/{id}', [APIbackcontactusController::class, 'viewContact'])->name('view.contact');
    Route::get('/edit-contact/{id}', [APIbackcontactusController::class, 'editContact'])->name('edit.contact');
    Route::get('contact-form', [APIbackcontactusController::class, 'showForm'])->name('contact.form');
    Route::post('/save-contact', [APIbackcontactusController::class, 'saveContact'])->name('contact.save');
    Route::post('/update-contact/{id}', [APIbackcontactusController::class, 'updateContact'])->name('update.contact');
    Route::delete('/contact/{id}', [APIbackcontactusController::class, 'deleteContact'])->name('delete.contact');
    Route::get('/contact/search', [APIbackcontactusController::class, 'searchContact'])->name('contact.search');


    Route::get('/report', [APIbackreportController::class, 'showReport'])->name('report');
    Route::get('/new-report', [APIbackreportController::class, 'showNewReport'])->name('new.report');
    Route::get('/ongoing-report', [APIbackreportController::class, 'showOngoingReport'])->name('ongoing.report');
    Route::get('/completed-report', [APIbackreportController::class, 'showCompleteReport'])->name('completed.report');
    Route::get('view-report/{id}', [APIbackreportController::class, 'viewReport'])->name('view.report');
    Route::get('/report/{id}/edit', [APIbackreportController::class, 'editReport'])->name('report.edit');
    Route::post('/report/{id}', [APIbackreportController::class, 'updateReport'])->name('report.update'); //update reports
    Route::delete('/report/{id}', [APIbackreportController::class, 'deleteReport'])->name('report.delete'); //delete reports
    Route::get('/reports/{province}', [APIbackreportController::class, 'showReportsByProvince'])->name('reports.by_province');
    Route::get('/report-form', [APIbackreportController::class, 'ShowForm'])->name('report.form');
    Route::post('/save-report-form', [APIbackreportController::class, 'storeReport'])->name('report.store');
    Route::get('/search-reports', [APIbackreportController::class, 'searchReports'])->name('search-reports');
    Route::get('/map', [APIbackreportController::class, 'showMap'])->name('map');

    Route::post('/logout', [APIbackfeedbackController::class, 'destroy'])->name('logout.user');
    Route::get('/profile', [APIbackprofileController::class, 'show'])->name('profile.show');
    Route::post('/profile-save', [APIbackprofileController::class, 'update'])->name('profile.update');
    });
});

// Default route for unauthorized access
Route::fallback(function () {
    return response()->json([
        'message' => 'Resource not found.'
    ], 404);
});

// require __DIR__.'/auth.php';
