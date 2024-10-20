<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wishlist;

class WishListController extends Controller
{
    public function Add_To_Wishlist(Request $request)
    {

        $customer_id = session()->get('customer_id');
        $product_id = $request->product_id;

        $wishlist = wishlist::where('product_id',$product_id)->where('customer_id',$customer_id)->first();

        if (session()->has('customer_id')) {

            if ($wishlist!=NULL) {
                if ($wishlist->product_id==$product_id && $wishlist->customer_id==$customer_id) {
                    return 1;
                }
            }else{
                $data = new wishlist;
                $data->customer_id = $customer_id;
                $data->product_id = $product_id;
                $data->save();
                return 2;  
            }
        }else{
            return 0;
        }
    }

    public function view_wishlist()
    {
        return view('user.wishlist.index');
    }

    public function loadWishlist()
    {
        $customer_id = session()->get('customer_id');
        $wishlist = wishlist::where('customer_id',$customer_id)->get();
        return view('user.wishlist.ajax.wishlist_body')->with([
            'wishlist'=>$wishlist
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('w_id');
        $data= wishlist::findOrFail($id);
        if ($data) {
            $data->delete();
            return true;
        }else{
            return false;
        }
    }
}
