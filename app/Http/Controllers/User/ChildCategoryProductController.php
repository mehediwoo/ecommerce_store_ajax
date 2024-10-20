<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\child_category;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class ChildCategoryProductController extends Controller
{
    public function index($slug)
    {
        $all_cat = category::latest()->take(15)->get();
        $brand = brand::inRandomOrder()->take(15)->get();
        return view('user.product.child_category.child_category_product')->with([
            'slug'=>$slug,
            'all_cat'=>$all_cat,
            'brand'=>$brand,
        ]);
    }

    public function get_product(Request $request)
    {
        $slug = $request->input('slug');
        $child_cat = child_category::where('slug',$slug)->first();
        // Filter
        $filter = $request->input('filter');
        if ($filter=='latest') {
            $product = product::where('child_cat_id',$child_cat->id)->latest()->paginate(15);
            return view('user.product.child_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='oldestToLatest'){
            $product = product::where('child_cat_id',$child_cat->id)->paginate(15);
            return view('user.product.child_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_high_low'){
            $product = product::where('child_cat_id',$child_cat->id)->orderBy('p_discount_price','DESC')->paginate(15);
            return view('user.product.child_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_low_high'){
            $product = product::orderBy('p_discount_price','ASC')->where('child_cat_id',$child_cat->id)->paginate(15);
            return view('user.product.child_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }else{
            $product = product::where('child_cat_id',$child_cat->id)->latest()->paginate(15);
            return view('user.product.child_category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }
    }
}
