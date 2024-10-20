<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class QuickViewProductController extends Controller
{
    public function get_product(Request $request)
    {
        $pro_id = $request->input('product_id');
        $product = product::where('id',$pro_id)->first();
        return view('user.quick_view_body')->with([
            'product'=>$product,
        ]);
    }
}
