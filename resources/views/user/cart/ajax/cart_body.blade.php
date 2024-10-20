<form action="" method="post" id="cart_qty_update_form">
    <div class="table-content table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="li-product-remove">remove</th>
                    <th class="li-product-thumbnail">images</th>
                    <th class="cart-product-name">Product</th>
                    <th class="li-product-price">Unit Price</th>
                    <th class="li-product-quantity">Quantity</th>
                    <th class="li-product-subtotal">Total</th>
                </tr>
            </thead>
            <tbody id="cart_body">
                @php
                $total = 0;   
                @endphp
                @if (session()->has('cart'))
                   @foreach (session()->get('cart') as $key=>$product)
                   <tr>
                       <td class="li-product-remove"><a href="" id="remove_cart_iteam" iteam_id="{{$key}}"><i class="fa fa-times"></i></a></td>
                       <td class="li-product-thumbnail">
                           <a href="#"><img src="{{asset('storage/'.$product['image'])}}" alt="{{$product['image']}}" style="height: 70px;width:70px"></a>
                       </td>
                       <td class="li-product-name"><a href="#">{{ substr($product['name'],0,20) }}</a></td>
                       <td class="li-product-price"><span class="amount">{{ $footer->default_currency }} {{ number_format($product['price'],0,'',',') }}</span></td>
                       <td class="quantity">
                           <label>Quantity</label>
                           <div class="cart-plus-minus">
                               <input class="cart-plus-minus-box" id="cart_qty" name="cart_qty" value="{{ $product['qty'] }}" type="text">

                               <div class="dec qtybutton" id="qty_minus" product_id="{{ $key }}" qty="{{ $product['qty'] }}">
                                    <i class="fa fa-angle-down"></i>
                                </div>

                                <div class="inc qtybutton" id="qty_plus" product_id="{{ $key }}">
                                    <i class="fa fa-angle-up"></i>
                                </div>
                           </div>
                       </td>
                       <td class="product-subtotal"><span class="amount">{{ $footer->default_currency }} {{ number_format($product['price']*$product['qty'],0,'',',') }}</span></td>
                   </tr> 
                   @php
                       $total = $total+$product['price']*$product['qty'];
                   @endphp
                   @endforeach
                @else
                <tr>
                   <td></td>
                   <td ></td>
                   <td style="color: red; text-align:center">Your cart is empty !</td>
                   <td></td>
                   <td></td>
                   <td ></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        {{-- <div class="col-12">
            <div class="coupon-all">
                <div class="coupon">
                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                </div>
                <div class="coupon2">
                    <input class="button" name="update_cart" value="Update cart" type="submit">
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                <h2>Cart totals</h2>
                <ul>
                    <li>Total <span>{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</span></li>
                </ul>
                <a href="{{ route('billing') }}">Proceed to checkout</a>
            </div>
        </div>
    </div>
</form>