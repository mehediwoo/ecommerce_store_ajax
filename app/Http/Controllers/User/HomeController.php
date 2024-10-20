<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class HomeController extends Controller
{
    public function index()
    {
        $category = category::where('status','enable')->latest()->take(30)->get();
        $hot_deal = product::where('status','enable')->where('hot_deal','on')->latest()->take(30)->get();
        $feature = product::where('status','enable')->where('feature','on')->latest()->take(30)->get();
        $slide_product = product::where('status','enable')->where('slide_product','on')->latest()->limit(10)->get();
        $home_category = category::where('status','enable')->where('on_home','yes')->take(3)->get();

        return view('user.home')->with([
            'category'=>$category,
            'hot_deal'=>$hot_deal,
            'feature'=>$feature,
            'home_category'=>$home_category,
            'slide_product'=>$slide_product
        ]);
    }
}
