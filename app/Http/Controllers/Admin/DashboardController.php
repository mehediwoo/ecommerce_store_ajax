<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sub_category;
use App\Models\child_category;
use App\Models\brand;
use App\Models\product;
use App\Models\order;
use App\Models\customer;

class DashboardController extends Controller
{
    public function index()
    {
        $category = category::count();
        $sub_category = sub_category::count();
        $child_category = child_category::count();
        $brand = brand::count();
        $product = product::count();
        $pending_ammount = order::where('status','processing')->get();
        $confirm_ammount = order::where('status','complete')->get();
        $customer = customer::count();
        return view('admin.dashboard')->with([
            'category'=>$category,
            'sub_category'=>$sub_category,
            'child_category'=>$child_category,
            'brand'=>$brand,
            'product'=>$product,
            'pending_ammount'=>$pending_ammount,
            'confirm_ammount'=>$confirm_ammount,
            'customer'=>$customer,
        ]);
    }
}
