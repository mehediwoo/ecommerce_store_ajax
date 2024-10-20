@extends('user.layout.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Billings Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->

<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="" method="post" id="billing_form">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Name <span class="required">*</span></label>
                                    <input value="{{ session()->get('name') }}" type="text" name="name">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Email</label>
                                    <input value="{{ session()->get('email') }}" type="text" name="email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="city">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text" name="address">
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>County <span class="required">*</span></label>
                                    <input placeholder="" type="text" name="country">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone  <span class="required">*</span></label>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="save_billing">
                            <input value="Save" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!--Checkout Area End-->

@endsection
@section('script')
<script>
    $(document).ready(function(){
        
        // save billing information
        $(document).on('submit','#billing_form',function(){
            event.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url:"{{ route('billing.store') }}",
                method:"POST",
                data:formData,
                contentType:false,
                processData:false,
                success:function(data){
                    if (data==true) {
                        toastr.success('Billing information save successfully !');
                        window.location.href="{{ route('checkout') }}";
                    }else{
                        toastr.error('Something went wrong, please submit again');
                    }
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error('<h6>'+value+'</h6>');
                    });
                    // $('#saveBrand').removeClass('d-none');
                    // $('#spinner').addClass('d-none');
                }
            });
        });
    })
</script>
@endsection