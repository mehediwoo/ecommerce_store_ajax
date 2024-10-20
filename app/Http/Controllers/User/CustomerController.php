<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassMail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    public function customer_auth()
    { 
        if (session()->has('email')) {
            return redirect()->route('home');
        }else{
            return view('user.customer_auth.login_register');
        }
    }

    public function customer_register(Request $request)
    {
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|min:6',
            'con_pass'=>'required|min:6|same:password'
        ],[
            'f_name.required'=>'Your first name field is empty',
            'l_name.required'=>'Your last name field is empty',
            'con_pass.same'=>'Password & confirm password did not match',
            'con_pass.required'=>'Confirm password is empty',
        ]);
        
        $customer = new customer;
        $customer->name = $request->input('f_name'). ' ' .$request->input('l_name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $result = $customer->save();
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    public function customer_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5',
        ]);

        $email    = $request->input('email');
        $password = $request->input('password');

        $customer = customer::where('email',$email)->first();
        if($customer==true && Hash::check($password, $customer->password)){
            session()->put('customer_id',$customer->id);
            session()->put('name',$customer->name);
            session()->put('email',$customer->email);
            return true;
        }else{
            return false;
        }
    }

    public function customer_logout()
    {
        session()->forget('customer_id');
        session()->forget('name');
        session()->forget('email');
        return redirect()->route('home');
    }

    public function forget_password()
    {
        return view('user.customer_auth.forget');
    }

    public function OTP(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);

        $email = $request->input('email');
        $customer = customer::where('email',$email)->first();

        if ($customer==true) {

            $user_name = $customer->name;
            $subject  = 'Reset password';
            $message  = mt_rand(100000, 999999);
            $mail = Mail::to($customer->email)->send(new ForgetPassMail($subject,$message,$user_name));
            if ($mail==true) {
                session()->put('forget_otp',$message);
                session()->put('user_mail',$email);
                return redirect()->route('check.otp');
            }else{
                return redirect()->route('customer.authentication')->with('error','Mail server is down, please try again latter');
            }

        }else{
            return redirect()->back()->with('error','we could not find your email in our systeam');
        }
        
        
    }

    public function check_otp()
    {
        return view('user.customer_auth.otp_check'); 
    }

    public function match_otp(Request $request)
    {
        $request->validate([
            'otp_code'=>'required|min:6|integer',
        ]);

        $otp = $request->input('otp_code');
        $check_otp = session()->get('forget_otp');
        if ($otp==$check_otp) {
            return redirect()->route('set.password');
        }else{
            session()->forget('forget_otp');
            session()->forget('user_mail');
            return redirect()->route('forget.password')->with('error','Your otp code did not match');
        }
    }

    public function set_password()
    {
        return view('user.customer_auth.set_pass');
    }

    public function store_password(Request $request)
    {
        $request->validate([
            'password'=>'required|min:6',
            'confirm_password'=>'required|min:6|same:password',
        ]);

        $session_email = session()->get('user_mail');
        $password = $request->input('password');
        $customer = customer::where('email',$session_email)->first();
        if ($customer==true) {
            $customer->password = Hash::make($password);
            $customer->save();
            session()->forget('user_mail');
            session()->forget('forget_otp');
            return redirect()->route('customer.authentication')->with('success','Your password has been changed');
        }else{
            return redirect()->route('forget.password');
        }
    }
}
