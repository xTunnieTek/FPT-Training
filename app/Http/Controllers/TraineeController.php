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
        // Thêm google_id vào bảng trainingid
        $trainee = new Trainee;
        $trainee->google_id = $google_id;
        $trainee->save();
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
}
