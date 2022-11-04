<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StaffController;




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

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [LoginController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [LoginController::class, 'callbackFromGoogle'])->name('callback');
});




Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('login');
Route::post('/login', [SignupController::class, 'postSignup'])->name('signup');


// Middeleware
Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'updateUserInfo'])->name('updateProfile');

        Route::get('/manage-trainer', [TrainerController::class, 'getTrainer'])->name('manageTrainer');
        Route::get('/all-trainer', [TrainerController::class, 'getAllTrainer'])->name('allTrainer');
        Route::get('/edit-trainer/{id}', [TrainerController::class, 'edit'])->name('editTrainer');
        Route::post('/edit-trainer/{id}', [TrainerController::class, 'update'])->name('updateTrainer');
        Route::get('/delete-trainer/{id}', [TrainerController::class, 'delete'])->name('deleteTrainer');

        // Staff
        Route::get('/manage-staff', [StaffController::class, 'getStaff'])->name('manageStaff');
        Route::get('/all-staff', [StaffController::class, 'getAllStaff'])->name('allStaff');
        Route::get('/edit-staff/{id}', [StaffController::class, 'edit'])->name('editStaff');
        Route::post('/edit-staff/{id}', [StaffController::class, 'update'])->name('updateStaff');
        Route::get('/delete-staff/{id}', [StaffController::class, 'delete'])->name('deleteStaff');

});


