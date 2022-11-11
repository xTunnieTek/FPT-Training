<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Trainee;
use App\Models\Enroll;
use App\Models\User;
use App\Models\Staff;
use App\Models\Role;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }

    // List All Course
    public function getCourseList()
    {
        Course::All();
        return view('/dashboard');
    }


    // List All User
    public function getUserList()
    {
        $users = User::All();
        return view('/dashboard');
    }


}
