<?php

use Illuminate\Support\Facades\Route;

// Frontsite
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;

// Backsite
// Backsite/Menagement Access
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\RoleController;

// Backsite/Masteer Data
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\SpecialistController;

// Backsite/Masteer Data
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\ReportController;
use App\Http\Controllers\Backsite\TransactionController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']],function (){ 
        // Appointment page
        Route::resource('appointment', AppointmentController::class);

        // Payment page
        Route::resource('payment', PaymentController::class);
});

// backsite nama menu
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], 
function (){ 

    // Dashboard page
    Route::resource('dashboard', DashboardController::class);

    // User Page
    Route::resource('user', UserController::class);

    // Role Page
    Route::resource('role', RoleController::class);

    // TypeUser Page
    Route::resource('type-user', TypeUserController::class);

    // Permission Page
    Route::resource('permission', PermissionController::class);
    
    // Config-Payment Page
    Route::resource('config-payment', ConfigPaymentController::class);
    
    // Consultation Page
    Route::resource('consultation', ConsultationController::class);
    
    // Specialist Page
    Route::resource('specialist', SpecialistController::class);
    
    // Appointment Backsite Page
    Route::resource('appointment', ReportAppointmentController::class);
    
    // Doctor Backsite Page
    Route::resource('doctor', DoctorController::class);
    
    // Report Backsite Page
    Route::resource('report', ReportController::class);

    // Transaction Backsite Page
    Route::resource('transaction', TransactionController::class);
});        


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
