<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sub_category;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class SubCategoryProductController extends Controller
{
    public function index($slug)
    {
        $all_cat = category::latest()->take(15)->get();
        $brand = brand::inRandomOrder()->take(15)->get();
        return view('user.product.sub_category.sub_category_product')->with([
            'slug'=>$slug,
            'all_cat'=>$all_cat,
            'brand'=>$brand,
        ]);
    }

    public function get_product(Request $request)
    {
        $slug = $request->input('slug');
        $sub_cat = sub_category::where('slug',$slug)->first();
        // Filter
        $filter = $request->input('filter');
        if ($filter=='latest') {
            $product = product::where('sub_cat_id',$sub_cat->id)->latest()->paginate(15);
            return view('user.product.sub_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='oldestToLatest'){
            $product = product::where('sub_cat_id',$sub_cat->id)->paginate(15);
            return view('user.product.sub_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_high_low'){
            $product = product::where('sub_cat_id',$sub_cat->id)->orderBy('p_discount_price','DESC')->paginate(15);
            return view('user.product.sub_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_low_high'){
            $product = product::orderBy('p_discount_price','ASC')->where('sub_cat_id',$sub_cat->id)->paginate(15);
            return view('user.product.sub_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }else{
            $product = product::where('sub_cat_id',$sub_cat->id)->latest()->paginate(15);
            return view('user.product.sub_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }
    }
}
