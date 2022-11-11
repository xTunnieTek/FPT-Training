<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DB;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TrainingController;



Route::get('/', function () {
    return view('login');
});




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
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');


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
        Route::post('/add-trainer', [TrainerController::class, 'add'])->name('addTrainer');

        // Staff
        Route::get('/manage-staff', [StaffController::class, 'getStaff'])->name('manageStaff');
        Route::get('/all-staff', [StaffController::class, 'getAllStaff'])->name('allStaff');
        Route::get('/edit-staff/{id}', [StaffController::class, 'edit'])->name('editStaff');
        Route::post('/edit-staff/{id}', [StaffController::class, 'update'])->name('updateStaff');
        Route::get('/delete-staff/{id}', [StaffController::class, 'delete'])->name('deleteStaff');
        Route::post('/add-staff', [StaffController::class, 'add'])->name('addStaff');

        // Category
        Route::get('/manage-category', [CategoryController::class, 'getCategory'])->name('manageCategory');

        // Course
        Route::get('/manage-course/Category={id}', [CourseController::class, 'getCourse'])->name('manageCourse');
        Route::get('/all-course/Category={id}', [CourseController::class, 'getAllCourse'])->name('allCourse');
        Route::get('/edit-course/{id}', [CourseController::class, 'edit'])->name('editCourse');
        Route::post('/edit-course/{id}', [CourseController::class, 'update'])->name('updateCourse');
        Route::post('/add-course', [CourseController::class, 'addCourse'])->name('addCourse');
        Route::get('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('deleteCourse');


        // Profile
        Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
        Route::post('updateProfile', [ProfileController::class, 'updateUserInfo'])->name('updateProfile');


        //Topic
        Route::get('/manage-topic/{id}', [TopicController::class, 'getTopic'])->name('manageTopic');
        Route::get('/all-topic/{id}', [TopicController::class, 'getAllTopic'])->name('allTopic');
        Route::get('/edit-topic/{id}', [TopicController::class, 'edit'])->name('editTopic');
        Route::post('/edit-topic/{id}', [TopicController::class, 'update'])->name('updateTopic');
        Route::get('/delete-topic/{id}', [TopicController::class, 'deleteTopic'])->name('deleteTopic');
        Route::post('/add-topic', [TopicController::class, 'addTopic'])->name('addTopic');


        // user
        Route::get('/manage-user', [UsersController::class, 'getUsers'])->name('manageUser');
        Route::get('/all-user', [UsersController::class, 'getAllUsers'])->name('allUser');
        Route::get('/manage-user/{id}/edit', [UsersController::class, 'editUser'])->name('editUser');
        Route::post('/manage-user/{id}/edit', [UsersController::class, 'updateUser'])->name('updateUser');
        Route::get('/manage-user/{id}/delete', [UsersController::class, 'deleteUser'])->name('deleteUser');


        // Trainee
        Route::get('/learning-ne', [TraineeController::class, 'addGoogleId'])->name('updateTraining');
        Route::get('/trainee/{google_id}', [TraineeController::class, 'getTraineeInfo'])->name('trainee');
        Route::post('/trainee/{google_id}/edit', [TraineeController::class, 'updateTraineeInfo'])->name('updateTrainee');

        //Training
        Route::get('/training/{google_id}/{courseid}', [TrainingController::class, 'addEnroll'])->name('training');
        Route::get('/mycourse', [TrainingController::class, 'getEnrollList'])->name('mycourse');
        Route::get('/mycourse/{courseid}', [TrainingController::class, 'getTopicList'])->name('mycourseDetail');
        Route::get('/mycourse/{courseid}/Lab={topicid}', [TrainingController::class, 'getTopicDetail'])->name('mycourseTopicDetail');


        // Learning
        Route::get('/learning', [LearningController::class, 'getCategory'])->name('learning');
        Route::get('/learning/{id}', [LearningController::class, 'getCourse'])->name('learningCourse');

        //News
        Route::get('/news', function()
        {
            return view('news');
        })->name('news');


        // Training
        Route::get('/manage-training',[TrainingController::class, 'getAllEnrollList'])->name('Managetraining');
        Route::get('/delete-training/{id}',[TrainingController::class, 'deleteEnroll'])->name('deleteTraining');
});


