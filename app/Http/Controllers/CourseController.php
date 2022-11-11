<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{



    public function getCourse($categoryid){
        $category = Category::all();
        $categoryname = Category::find($categoryid) -> categoryname;
        $course = course::join('category', 'courses.categoryid', '=', 'category.categoryid')->select('courses.*', 'category.*')->where('courses.categoryid', $categoryid)->get();
        return view('course', ['categoryname' => $categoryname, 'category' => $category, 'course' => $course, 'categoryid' => $categoryid]);
    }


    public function getAllCourse($categoryid){
        $category = Course::find($categoryid);
        $course = course::join('category', 'courses.categoryid', '=', 'category.categoryid')->select('courses.*', 'categoryname as categoryname')->where('courses.categoryid', $categoryid)->get();
        return view('coursetable', ['course' => $course, 'category' => $category,  'categoryid' => $categoryid]);
    }


    // Add
    public function addCourse(Request $request){
        $course = new Course;
        $course->coursename = $request->coursename;
        $course->categoryid = $request->categoryid;
        $course->trainer = $request->trainer;
        $course->images = $request->images;
        $course->startdate = $request->startdate;
        $course->description = $request->description;
        $course->save();
        return redirect()->back();
    }

    // Edit
    public function editCourse($courseid){
        $course = Course::find($courseid);
        return view('editcourse', ['course' => $course]);
    }

    // Update
    public function updateCourse(Request $request, $courseid){
        $course = Course::find($courseid);
        $course->coursename = $request->coursename;
        $course->categoryid = $request->categoryid;
        $course->trainer = $request->trainer;
        $course->startdate = $request->startdate;
        $course->description = $request->description;
        $course->save();
        return redirect()->route('manageCourse')->with('success', 'Course Updated Successfully!');
    }

    // Delete
    public function deleteCourse($courseid){
        $course = Course::find($courseid);
        $course->delete();
        return redirect()->back();
    }


}
