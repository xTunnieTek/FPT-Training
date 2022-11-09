<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Learning;
use App\Models\Course;
use App\Models\User;
use App\Models\Topic;


class LearningController extends Controller
{
    // getCategory
    public function getCategory(){
        $category = Category::all();
        return view('learning', ['category' => $category]);
    }

    //getCourse
    public function getCourse($categoryid){
        $category = Course::find($categoryid);
        $course = course::join('category', 'courses.categoryid', '=', 'category.categoryid')->select('courses.*', 'categoryname as categoryname')->where('courses.categoryid', $categoryid)->get();
        return view('learning-2', ['course' => $course, 'category' => $category,  'categoryid' => $categoryid]);
    }

    //getTopic
    public function getTopic(Request $request)
    {
        $topic = $request->input('topic');
        return view('learning', ['topic' => $topic]);
    }

    // Enroll Course
    public function enrollCourse(Request $request)
    {
        $course = $request->input('course');
        return view('learning', ['course' => $course]);
    }
}
