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

    // Edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('editTrainer', compact('user'));
    }



}
