<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateUserInfo(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->about = $request->about;
        $user->specialized = $request->specialized;
        $user->save();
        return redirect()->route('profile');
    }

    public function calAge($birthday)
    {
        $date = date_create($birthday);
        $now = date_create('today');
        return date_diff($date, $now)->y;
    }

//   Delete
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }


}


