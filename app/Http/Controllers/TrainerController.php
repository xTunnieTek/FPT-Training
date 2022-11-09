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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'trainer';
        $user->city = $request->city;
        $user->specialized = $request->specialized;
        $user->save();
        return redirect()->back();
    }

    // Edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('editTrainer', compact('user'));
    }



}
