<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function googleAddressMaps()
    {
        return view('google_map');
    }
    public function dashboard()
    {
        // dd(Auth::user());
        return view('admin.dashboard');
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->user_status = $request->user_status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function userList()
    {
        // dd('okk');
        $userDetails = User::orderBy('id','desc')->get();
        // dd($userDetails);
        return view('admin.user_list', compact('userDetails'));
    }
    public function viewAddUser()
    {
        return view('admin.add_user');
    }

    public function googleAutoAddress()
    {
        return view('admin.add_user');
    }

    public function addUser(Request $request)
    {
        // dd($request->all());
        $addDetails = new User();
        $addDetails->name = $request->name;
        $addDetails->email = $request->email;
        $addDetails->password = bcrypt($request->password);
        $addDetails->phone = $request->phone;
        $addDetails->address = $request->address;
        $addDetails->save();
        return redirect()->route('user.list')->with('message','Add user successfully.');
    }

    public function viewProfile($id)
    {
        $getDetails = User::find($id);
        return view('admin.view_profile', compact('getDetails'));
    }

    public function saveEditProfile(Request $request)
    {
        // dd($request->all());
        $addDetails = User::find($request->id);
        $addDetails->name = $request->name;
        $addDetails->email = $request->email;
        $addDetails->phone = $request->phone;
        $addDetails->address = $request->address;
        $addDetails->save();
        return redirect()->route('user.list')->with('message','Details updated successfully.');
    }

    public function editProfile($id)
    {
        $getDetails = User::find($id);
        return view('admin.edit', compact('getDetails'));
    }

    public function deleteUser($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return back()->with('message', 'User deleted successfully.');
    }
}
