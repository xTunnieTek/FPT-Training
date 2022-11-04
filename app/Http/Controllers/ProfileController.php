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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->specialized = $request->specialized;
        $user->about = $request->about;
        $user->save();

        return redirect()->route('updateProfile')->with('success', 'Profile updated successfully');
    }

//   Delete
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }

}


