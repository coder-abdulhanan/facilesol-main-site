<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Admins;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function index()
    {
        return view('backend.login');
    }

    public function onLogin(Request $request)
    {
        // dd($request->toArray());

        $admin = Admins::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
        if($admin){
            session()->put('id', $admin->id);
            session()->put('first_name', $admin->first_name);
            session()->put('last_name', $admin->last_name);
            session()->put('email', $admin->email);
            return redirect()->route('admin.home')->with('success', 'Login Success');;

        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid Credentials.');;
            // return redirect('admin/login')->with('error', 'Invalid Credentials.');
        }
    }

    public function logoutAdmin(){
        session()->forget('id');
        session()->forget('first_name');
        session()->forget('last_name');
        session()->forget('email');
        return redirect()->route('admin.login')->with('success', 'Logout Success');;
    }

}
