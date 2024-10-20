@extends('user.layout.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->

<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-stock-status">Stock Status</th>
                                </tr>
                            </thead>
                            <tbody id="wishlistTableBody">
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->
@endsection

@section('script')
<script>
    $(document).on('ready',function(){
        
        // get wishlist table data
        function loadWishlist()
        {
            $.ajax({
                url:"{{ route('loadWishlist') }}",
                success:function(data){
                    $('#wishlistTableBody').html(data);
                }
            });
        }
        loadWishlist();

        // Remove wishlist
        $(document).on('click','#remove_wishlist',function(){
            event.preventDefault();
            let w_id = $(this).attr('w_id');
            
            $.ajax({
                url: "{{ route('delete.wishlist') }}",
                data: {w_id:w_id},
                success:function(data){
                    if (data==true) {
                        toastr.success('Delete successfully');
                        loadWishlist();
                    } else {
                        toastr.error('Error, please try again');
                        loadWishlist();  
                    }
                    
                }
            });
        });
    });
</script>
@endsection