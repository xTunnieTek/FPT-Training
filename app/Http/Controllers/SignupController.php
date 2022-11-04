<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SignupController extends Controller
{
    public function getSignup()
    {
        return view('login');
    }

    public function postSignup(Request $request)
    {
        if (User::where('email', '=', $request['email'])->exists()) {
            return redirect()->back();
        }
        else {
            $this->validate($request, [
                'email'    => 'required|email|unique:users',
                'password' => 'required',
            ]);
            $user = new User();
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->save();
            Auth::login($user);
            return redirect()->route('login');
        }
    }
}
