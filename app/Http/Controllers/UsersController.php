<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    // Get all users
    public function getUsers()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    // Add
    public function addUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->back();
    }

    // Edit
    public function editUser($userid)
    {
        $user = User::find($userid);
        return view('editUser', ['user' => $user]);
    }

    // Update
    public function updateUser(Request $request, $userid)
    {
        $user = User::find($userid);
        $user->name = $request->name;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->about = $request->about;
        $user->specialized = $request->specialized;
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }

    // Delete
    public function deleteUser($userid)
    {
        $user = User::find($userid);
        $user->delete();
        return redirect()->back();
    }


}
