<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainee;

class TraineeController extends Controller
{
    //Nếu user đằng nhập là trainee thì thêm google_id vào bảng trainingid
    public function addGoogleId(Request $request)
    {
        // Get google_id từ bảng users
        $google_id = Auth::user()->google_id;
        // Nếu google_id = null thì thông báo lỗi
        if($google_id == null){
            time_nanosleep(0, 500000000);
            return redirect()->back()->with('error', 'Bạn chưa đăng nhập bằng google')->with('time', 1)->with('url', '/logout');
        }
        else{
            // Nếu google_id đã tồn tại thì thông báo lỗi
            $checkGoogleId = Trainee::where('google_id', $google_id)->first();
            if($checkGoogleId){
                return redirect()->back()->with('error', 'Google ID đã tồn tại');
            }
            else{
                $trainee = new Trainee;
                $trainee->google_id = $google_id;
                $trainee->save();
            }
            return redirect()->back();
        }
        // $trainee = new Trainee;
        // $trainee->google_id = $google_id;
        // $trainee->save();
        return redirect('/dashboard');
    }

    //Lấy thông tin của trainee
    public function getTraineeInfo($google_id)
    {
        $trainee = Trainee::where('google_id', $google_id)->first();
        return view('trainee', ['trainee' => $trainee]);
    }

    //Cập nhật thông tin của trainee
    public function updateTraineeInfo(Request $request)
    {
        $trainee = Trainee::where('google_id', $request->google_id)->first();
        $trainee->skill = $request->skill;
        $trainee->toeic = $request->toeic;
        $trainee->exp = $request->exp;
        $trainee->save();
        return redirect()->back();
    }


    public function getAllTrainee()
    {
        $trainee = User::where('role', 'trainee')
        ->join('trainingid', 'users.google_id', '=', 'trainingid.google_id')
        ->select('users.*', 'trainingid.*')
        ->get();
        return view('traineetable', compact('trainee'));
    }
}
