<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{
    public function index()
    {
       return view('admin.order.pending.index');
    }

    public function get_pending_order()
    {
        $order = order::where('status','processing')->get();
        return view('admin.order.pending.ajax.show')->with([
            'order'=>$order,
        ]);
    }

    public function mark_as_confirm(Request $request)
    {
        $id = $request->id;
        $data = order::findOrFail($id);
        if ($data==true) {
            $data->status='complete';
            $data->update();
            return true;
        }
    }
}
