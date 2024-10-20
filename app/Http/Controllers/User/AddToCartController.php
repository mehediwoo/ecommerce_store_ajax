<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class AddToCartController extends Controller
{
    public function Add_To_Cart(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        $product = product::findOrFail($product_id);
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $product->id=>[
                    'image'=>$product->thumbnail,
                    'name'=>$product->p_title,
                    'price'=>$price,
                    'qty'=>$quantity,
                ]
            ];
            session()->put('cart',$cart);
            return true;
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
            session()->put('cart',$cart);
            return true;
        }

        $cart[$product->id]=[
            'image'=>$product->thumbnail,
            'name'=>$product->p_title,
            'price'=>$price,
            'qty'=>$quantity,
        ];
        session()->put('cart',$cart);
        return true;

    }

    public function loadCart(Request $request)
    {
        return view('user.layout.cart_header');

    }

    public function remove_cart(Request $request)
    {
        $iteam_id=$request->input('iteam_id');
        $cart = session()->get('cart');
        if (isset($cart[$iteam_id])) {
            unset($cart[$iteam_id]);
            session()->put('cart',$cart);
        }
    }

    public function cart_plus(Request $request)
    {
        $cart = session()->get('cart');
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty']++;
            session()->put('cart',$cart);
            return true;
        }
        
    }

    public function cart_minus(Request $request)
    {
        $cart = session()->get('cart');
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty']--;
            session()->put('cart',$cart);
            return true;
        }
        
    }

    public function view_cart()
    {
        return view('user.cart.view_cart');
    }

    public function cart_data()
    {
        return view('user.cart.ajax.cart_body');
    }
}
