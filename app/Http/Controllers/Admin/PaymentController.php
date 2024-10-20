<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment_method;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.setting.payment.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_name'=>'required',
            'store_id'=>'required',
            'signature_key'=>'required'
        ]);

        $data = new payment_method;
        $data->payment_name = $request->input('payment_name');
        $data->store_id = $request->input('store_id');
        $data->signature_key = $request->input('signature_key');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function payment_update(Request $request)
    {
        $request->validate([
            'payment_name'=>'required',
            'store_id'=>'required',
            'signature_key'=>'required'
        ]);

        $paymentId = $request->input('payment_id');
        $data = payment_method::findOrFail($paymentId);
        $data->payment_name = $request->input('payment_name');
        $data->store_id = $request->input('store_id');
        $data->signature_key = $request->input('signature_key');
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function payment_delete(Request $request)
    {
        $id = $request->input('id');
        $data = payment_method::where('id',$id)->first();
        if ($data) {
            $data->delete();
            return true;
        }else{
            return false;
        }
    }

    public function get_payment()
    {
        $payment = payment_method::latest()->get();
        return view('admin.setting.payment.ajax.show', compact('payment'));
    }

    public function payment_status(Request $request)
    {
        $status_id = $request->input('id');
        payment_method::where('status', '=', 1)->update(['status' => 0]);

        $payment = payment_method::findOrFail($status_id);
        $payment->status = 1;
        $payment->update();
        return true;
        
    }
}
