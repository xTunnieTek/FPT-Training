<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StaffController extends Controller
{

    public function getStaff(){
        $staffs = User::where('role', 'staff')->get();
        return view('staff', compact('staffs'));
    }

    public function getAllStaff(){
        $staffs = User::where('role', 'staff')->get();
        return view('allStaff', compact('staff'));
    }

    // Edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('editStaff', compact('user'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->specialized = $request->specialized;
        $user->save();
        return redirect()->route('staff')->with('success', 'Staff Updated Successfully!');
    }

    // Delete
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('staff')->with('success', 'Staff Deleted Successfully!');
    }




}
