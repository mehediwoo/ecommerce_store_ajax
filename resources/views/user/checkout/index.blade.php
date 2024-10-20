@php
  $shipping_info = App\Models\billing_info::where('customer_id',session()->get('customer_id'))->first();  
@endphp
@extends('user.layout.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->

<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <h3>Billing Details</h3>
                <div class="card mt-3" style="width: 26rem;">
                    <div class="card-header bg-warning">
                      Product Shipping Address
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Customer Name : {{ session()->get('name') }}</li>
                      <li class="list-group-item">Customer Email : {{ session()->get('email') }}</li>
                      <li class="list-group-item">Customer Phone : {{ $shipping_info->phone }}</li>
                      <li class="list-group-item">Customer City : {{ $shipping_info->city }}</li>
                      <li class="list-group-item">Customer Country : {{ $shipping_info->country }}</li>
                      <li class="list-group-item">Customer Address : {{ $shipping_info->address }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Quantity</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @if (session()->has('cart'))
                                    @foreach (session()->get('cart') as $row)
                                    <tr class="cart_item">
                                        <td class="cart-product-name"> {{ $row['name'] }}</td>
                                        <td class="cart-product-name"> {{ $row['qty'] }}</td>
                                        <td class="cart-product-total"><span class="amount">{{ $footer->default_currency }} {{ number_format($row['price'],0,'',',') }}</span></td>  
                                    </tr>
                                    @php
                                        $total = $total+$row['price']*$row['qty'];
                                    @endphp
                                    @endforeach
                                @endif
                    
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <form action="{{ route('place.order') }}" method="POST" id="placeOrder">
                                @csrf
                                <input type="radio" id="cash" name="payment" value="cash">
                                <label for="html">Cash On Delivery</label>

                                <input type="radio" id="online" name="payment" value="online" checked>
                                <label for="css">Online Payment</label><br>
                                

                                <div class="order-button-payment">
                                    <input value="Place order" type="submit">
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->

@endsection

@section('script')

<script>
    $(document).ready(function(){
        
        // Place Order form
        // $(document).on('submit','#placeOrder',function(event){
        //     event.preventDefault();
        //     let formData = new FormData(this);

        //     $.ajax({
        //         url: "{{ route('place.order') }}",
        //         method:"POST",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success:function(data){
        //             //
        //             if (data==1) {
        //                 toastr.success('Your order has been processing');
        //             }else if(data==2){
        //                 toastr.warning('Please configure your payment method systeam');
        //             }
                    
        //         },
        //         error:function(error){
        //             //XMLHttpRequest.withCredentials = "true"
        //             let err = error.responseJSON;
        //             $.each(err.errors,function(index,value){
        //                 toastr.error('<h6>'+value+'</h6>');
        //             });
        //         }
        //     });
        // });
    });

    
</script>
    
@endsection