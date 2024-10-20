<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class ShopController extends Controller
{
    public function index()
    {
        $category = category::latest()->take(10)->get();
        $p_assets = product::inRandomOrder()->take(10)->get();
        $brand = brand::latest()->take(10)->get();
        return view('user.product.shop.shop')->with([
            'category'=>$category,
            'brand'=>$brand,
            'p_assets'=>$p_assets,
        ]);
    }

    public function get_product(Request $request)
    {
        // Filter
        $filter = $request->input('filter');
        if ($filter=='latest') {
            $product = product::latest()->paginate(15);
            return view('user.product.shop.ajax.show')->with([
                'product'=>$product,

            ]);
        }elseif($filter=='oldestToLatest'){
            $product = product::paginate(15);
            return view('user.product.shop.ajax.show')->with([
                'product'=>$product,

            ]);
        }elseif($filter=='price_high_low'){
            $product = product::orderBy('p_discount_price','DESC')->paginate(15);
            return view('user.product.shop.ajax.show')->with([
                'product'=>$product,

            ]);
        }elseif($filter=='price_low_high'){
            $product = product::orderBy('p_discount_price','ASC')->paginate(15);
            return view('user.product.shop.ajax.show')->with([
                'product'=>$product,

            ]);
        }else{
            $product = product::latest()->paginate(15);
            return view('user.product.shop.ajax.show')->with([
                'product'=>$product,

            ]);
        }
    }
}
