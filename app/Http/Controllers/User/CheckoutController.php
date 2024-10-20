<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\billing_info;

class CheckoutController extends Controller
{
    public function index()
    {
        $customer = billing_info::where('customer_id',session()->get('customer_id'))->first();
        if ($customer== true) {
            return view('user.checkout.index');
        }else{
            return redirect()->route('billing');
        }
        
    }

    public function billing()
    {
        $customer = billing_info::where('customer_id',session()->get('customer_id'))->first();
        if ($customer== true) {
            return redirect()->route('checkout');
        }else{
            return view('user.checkout.billing');
        }
    }

    // Save user Billing information
    public function billing_store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'city'=>'required',
            'address'=>'required',
            'country'=>'required',
            'phone'=>'required',
        ]);


        $billing = new billing_info;
        $billing->customer_id = session()->get('customer_id');
        $billing->city = $request->input('city');
        $billing->address = $request->input('address');
        $billing->country = $request->input('country');
        $billing->phone = $request->input('phone');
        $result = $billing->save();
        if ($result==true) {
            return true;
        }else{
            return false;
        }
    }
}
