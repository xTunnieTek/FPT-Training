<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class TrainerController extends Controller
{
    public function getTrainer(){
        $trainers = User::where('role', 'trainer')->get();
        return view('trainer', compact('trainers'));
    }

    public function getAllTrainer(){
        $trainers = User::where('role', 'trainer')->get();
        return view('allTrainer', compact('trainers'));
    }

    // Add
    public function add(Request $request){
        // Nếu email đã tồn tại thì thông báo lỗi
        $checkEmail = User::where('email', $request->email)->first();
        if($checkEmail){
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }
        else
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'trainer';
            $user->city = $request->city;
            $user->specialized = $request->specialized;
            $user->save();
        }
        return redirect()->back()->with('success', 'Đã khởi tạo thành công');
    }

    // Edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('editTrainer', compact('user'));
    }



}
