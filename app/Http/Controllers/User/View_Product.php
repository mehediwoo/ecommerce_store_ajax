<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class View_Product extends Controller
{
    public function index($slug)
    {
        $product = product::where('p_slug',$slug)->first();
        $similar_iteam = product::where('sub_cat_id',$product->sub_cat_id)->take(20)->latest()->get();
        return view('user.product.single_product')->with([
            'product'=>$product,
            'similar_iteam'=>$similar_iteam
        ]);
    }
}
