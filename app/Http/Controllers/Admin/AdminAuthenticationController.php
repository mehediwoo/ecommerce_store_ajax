<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\admin_auth;

class AdminAuthenticationController extends Controller
{
    public function index()
    {
        if (session()->has('admin_email')) {
            return redirect()->route('dashboard');
        }else{
            return view('admin.login.index');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = admin_auth::where('email',$email)->first();
        if ($admin==true && Hash::check($password,$admin->password)) {
           session()->put('admin_name',$admin->name);
           session()->put('admin_email',$admin->email);
           return redirect()->route('dashboard')->with('success','Admin login success');
        }else{
            return redirect()->back()->with('error','Invalid credential');
        }
    }

    public function logout()
    {
        session()->forget('admin_email');
        session()->forget('admin_name');
        return redirect()->route('login.index');
    }
}
