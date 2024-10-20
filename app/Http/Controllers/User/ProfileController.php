<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $id = session()->get('customer_id');
        $pending_order = order::where('customer_id',$id)->where('status','processing')->get();
        $confirm_order = order::where('customer_id',$id)->where('status','complete')->get();
        $pending_ammount = order::where('customer_id',$id)->where('status','processing')->get();
        $confirm_ammount = order::where('customer_id',$id)->where('status','complete')->get();
        return view('user.profile.dashboard')->with([
            'pending_order'=>$pending_order,
            'confirm_order'=>$confirm_order,
            'pending_ammount'=>$pending_ammount,
            'confirm_ammount'=>$confirm_ammount,
        ]);
    }

    public function profile()
    {
        return view('user.profile.profile');
    }

    public function pending_order()
    {
        $id = session()->get('customer_id');
        $pending_order = order::where('customer_id',$id)->where('status','processing')->paginate(7);
        return view('user.profile.pending')->with([
            'pending_order'=>$pending_order,
        ]);
    }

    public function complete_order()
    {
        $id = session()->get('customer_id');
        $complete_order = order::where('customer_id',$id)->where('status','complete')->paginate(7);
        return view('user.profile.complete')->with([
            'complete_order'=>$complete_order,
        ]);
    }
}
