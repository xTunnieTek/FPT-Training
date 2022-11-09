<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\TopicController;
use App\Models\User;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\Trainee;
use App\Models\Topic;
use App\Models\Trainer;
use App;

class TrainingController extends Controller
{
    // Add Enroll
    public function addEnroll(Request $request)
    {
        $traineeid = Auth::user()->google_id;
        $courseid = Course::where('courseid', $request->courseid)->first();
        //add enroll
        $enroll = new Enroll;
        $enroll->trainingid = $traineeid;
        $enroll->courseid = $courseid->courseid;
        $enroll->date = date('Y-m-d');
        // dd($enroll);
        $enroll->save();
        return redirect('/dashboard');
    }

    // Get Enroll List
    public function getEnrollList()
    {
        $traineeid = Auth::user()->google_id;
        // Enroll List join Course
        $enroll = Enroll::join('courses', 'enroll.courseid', '=', 'courses.courseid')
        ->where('enroll.trainingid', $traineeid)
        ->get();
        // dd($enrollList);
        return view('mycourse', compact('enroll'));
    }

    // Get Topic List by Course ID
    public function getTopicList($courseid)
    {
        $traineeid = Auth::user()->google_id;
        $topic = Course::join('topics', 'courses.courseid', '=', 'topics.courseid')
        ->where('courses.courseid', $courseid)
        ->get();
        $topicid = Topic::where('courseid', $courseid)->first();
        return view('learning-3', compact('topic','topicid'));
    }

    // Get Topic Detail by Topic ID and all Topic
    public function getTopicDetail($courseid, $topicid)
    {
        $traineeid = Auth::user()->google_id;
        $course = Course::where('courseid', $courseid)->first();
        $topic = Topic::where('topicid', $topicid)->first();
        // $topicAll = Topic::where('courseid', $courseid)->get();
        $topicAll = Topic::join('courses', 'topics.courseid', '=', 'courses.courseid')
        ->where('courses.courseid', $courseid)
        ->get();
        return view('learning-4', compact('topic','topicAll'));
    }

}
