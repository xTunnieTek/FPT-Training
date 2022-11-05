<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
    public function getCourse(){
    // Nối bảng course và category
        $course = course::join('category', 'courses.categoryid', '=', 'category.categoryid')->select('courses.*', 'categoryname as categoryname')->get();
        return view('course', ['course' => $course]);
    }

    public function getAllCourse(){
        $course = course::join('category', 'courses.categoryid', '=', 'category.categoryid')->select('courses.*', 'categoryname as categoryname')->get();
        return view('coursetable', ['course' => $course]);
    }


    // Add
    public function addCourse(Request $request){
        $course = new Course;
        $course->coursename = $request->coursename;
        $course->categoryid = $request->categoryid;
        $course->trainer = $request->trainer;
        $course->startdate = $request->startdate;
        $course->description = $request->description;
        $course->save();
        return redirect()->route('manageCourse')->with('success', 'Course Added Successfully!');
    }


}
