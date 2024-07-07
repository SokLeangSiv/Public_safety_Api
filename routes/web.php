<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceReport;
use App\Http\Controllers\Feedback;
use App\Http\Controllers\feedBackController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\API\Back\APIbackauthController;


use App\Http\Controllers\API\Front\APIcontactusController;
use App\Http\Controllers\API\Front\APIreportController;
use App\Http\Controllers\API\Front\APIserviceReportController;
use App\Http\Controllers\API\Front\APIfeedBackController;
use App\Http\Controllers\API\Front\APIuserProfileController;
use App\Http\Controllers\API\Front\APIprofileController;
use App\Http\Controllers\API\Front\APIfrontauthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/APIregister', [APIfrontauthController::class, 'register']);
Route::post('/APIlogin', [APIfrontauthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::controller(ReportController::class)->group(function(){


        //get form

        Route::get('/reports', 'showForm')->name('show.form');

        //post form

        Route::post('/reports/create', 'storeForm')->name('store.form');


    });

    Route::controller(ContactUsController::class)->group(function(){

        //contact-us

        Route::get('/contact-us', 'showContact')->name('show.contact.us');

        //about us

        Route::get('/about-us', 'showAbout')->name('show.about.us');

        //store contact

        Route::post('/contact-us/create', 'storeContact')->name('store.contact');

    });

    Route::controller(ServiceReport::class)->group(function(){

        //service report
        Route::get('/service/fire', 'showService')->name('show.fire');

        //emergency

        Route::get('/emergency' , 'showEmergency')->name('show.emergency');

    });

    Route::controller(feedBackController::class)->group(function(){

        //feedback

        Route::get('/feedback', 'showFeedback')->name('show.feedback');

        //store feedback

        Route::post('/feedback/create', 'storeFeedback')->name('store.feedback');

    });


    Route::controller(UserProfileController::class)->group(function(){

        //user profile

        Route::get('/profile', 'showProfile')->name('show.profile');

        //store profile

        Route::post('/profile/create', 'storeProfile')->name('store.profile');

        //logout

        Route::get('/logout', 'logout')->name('user.logout');
    });


});





// require __DIR__.'/auth.php';
