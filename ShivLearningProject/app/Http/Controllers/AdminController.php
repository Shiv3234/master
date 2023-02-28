<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.register');
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function userLogin(Request $request)
    {
        // dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('dashboard');
        } else {
            return back()->with('message', 'Invalide credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function userRegister(Request $request)
    {
        // dd($request->all());
        $addDetails = new User();
        $addDetails->name = $request->name;
        $addDetails->email = $request->email;
        $addDetails->password = bcrypt($request->password);
        $addDetails->phone = $request->phone;
        $addDetails->address = $request->address;
        $addDetails->save();
        return redirect()->route('user.list')->with('message', 'Add user successfully.');
    }
}
