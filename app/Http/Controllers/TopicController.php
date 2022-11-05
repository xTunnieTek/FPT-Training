<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\Topic;

class TopicController extends Controller
{
    public function getTopic($courseid){
        $topic = topic::join('courses', 'topics.courseid', '=', 'courses.courseid')->select('topics.*', 'coursename as coursename')->where('topics.courseid', $courseid)->get();
        return view('topic', ['topic' => $topic]);
    }

    public function getAllTopic(){
        $topic = topic::join('courses', 'topics.courseid', '=', 'courses.courseid')->select('topics.*', 'courses.*')->get();
        return view('topictable', ['topic' => $topic]);
    }

    public function addTopic(Request $request){
        $topic = new Topic;
        $topic->courseid = $request->courseid;
        $topic->title = $request->title;
        $topic->about = $request->about;
        $topic->link = $request->link;
        $topic->save();
        return redirect()->route('manageTopic')->with('success', 'Topic Added Successfully!');
    }

    public function editTopic($topicid){
        $topic = Topic::find($topicid);
        return view('edittopic', ['topic' => $topic]);
    }

    public function updateTopic(Request $request, $topicid){
        $topic = Topic::find($topicid);
        $topic->courseid = $request->courseid;
        $topic->title = $request->title;
        $topic->about = $request->about;
        $topic->link = $request->link;
        $topic->save();
        return redirect()->route('manageTopic')->with('success', 'Topic Updated Successfully!');
    }

    public function deleteTopic($topicid){
        $topic = Topic::find($topicid);
        $topic->delete();
        return redirect()->route('manageTopic')->with('success', 'Topic Deleted Successfully!');
    }
}
