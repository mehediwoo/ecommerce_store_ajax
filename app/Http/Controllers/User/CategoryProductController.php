<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class CategoryProductController extends Controller
{
    public function index($slug)
    {
        $all_cat = category::latest()->take(15)->get();
        $brand = brand::inRandomOrder()->take(15)->get();
        return view('user.product.category.category_product')->with([
            'slug'=>$slug,
            'all_cat'=>$all_cat,
            'brand'=>$brand,
        ]);
    }

    public function get_product(Request $request)
    {
        $slug = $request->input('slug');
        $category = category::where('slug',$slug)->first();
        // Filter
        $filter = $request->input('filter');
        if ($filter=='latest') {
            $product = product::where('cat_id',$category->id)->latest()->paginate(15);
            return view('user.product.category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='oldestToLatest'){
            $product = product::where('cat_id',$category->id)->paginate(15);
            return view('user.product.category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_high_low'){
            $product = product::where('cat_id',$category->id)->orderBy('p_discount_price','DESC')->paginate(15);
            return view('user.product.category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }elseif($filter=='price_low_high'){
            $product = product::orderBy('p_discount_price','ASC')->where('cat_id',$category->id)->paginate(15);
            return view('user.product.category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }else{
            $product = product::where('cat_id',$category->id)->latest()->paginate(15);
            return view('user.product.category.ajax.show')->with([
                'slug'=>$slug,
                'product'=>$product,

            ]);
        }
    }

    public function get_brand_product(Request $request)
    {
        $slug = $request->input('slug');
        $brand = $request->input('brand_id');
        $product = product::where('brand_id',$brand)->latest()->paginate(15);
        return view('user.product.category.ajax.show')->with([
            'slug'=>$slug,
            'product'=>$product,

        ]);
    }

}
