@extends('user.layout.app')
@section('content')
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12" id="cart_data">
                
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    $(document).ready(function(){
        
        function cart_page_body(){
            $.ajax({
                url:"{{ route('cart.data') }}",
                success:function(data){
                    $('#cart_data').html(data);
                }
            });
        }
        cart_page_body();

        $(document).on('click','#remove_cart_iteam',function(){
            event.preventDefault();
            var iteam_id= $(this).attr('iteam_id');
            $.ajax({
                url:"{{ route('remove.cart.iteam') }}",
                data:{iteam_id:iteam_id},
                success:function(data){
                    cart_page_body();
                    toastr.success('Iteam has been remove');
                }
            });
        });

        // cart iteam quantity plus 
        $(document).on('click','#qty_plus',function(){
            event.preventDefault();
            let product_id = $(this).attr('product_id');
            $.ajax({
                url:"{{ route('cart.plus') }}",
                data:{product_id:product_id},
                success:function(data){
                    cart_page_body();
                    toastr.success('Iteam has beend increase');
                }
            });
        });

        // cart iteam quantity minus 
        $(document).on('click','#qty_minus',function(){
            event.preventDefault();
            let product_id = $(this).attr('product_id');
            let qty = $(this).attr('qty');
            if (qty <= 1) {
                toastr.error('Invalid quantity');
            }else{
                $.ajax({
                    url:"{{ route('cart.minus') }}",
                    data:{product_id:product_id},
                    success:function(data){
                        cart_page_body();
                        toastr.success('Iteam has beend de-increase');
                    }
                });
            }
        });
    });
</script>
@endsection