@extends('user.layout.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Forget Password</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60 mt-30">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Forget Password OTP-->
                <form action="{{ route('forget.otp') }}" method="POST">
                    <div class="login-form">
                        <h4>Are you forget your password, please input your register email and recover your account.</h4>
                        <div class="row">
                            @csrf
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" name="email">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            
                            <div class="col-md-12">
                                <button class="register-button mt-0" style="cursor: pointer">Finding ...</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->


@endsection
@section('script')
<script>
    $(document).ready(function(){

        
        // customer login
        $(document).on('submit','#login_form',function(){
            event.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url:'{{ route("customer.login") }}',
                method:'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                    if (data==true) {
                        toastr.success('Lgoin successfully !');
                        window.location.href="{{ route('home') }}";
                    }else{
                        toastr.error('Wrong information, plese give a valid login information');
                    }
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error('<h5>'+value+'</h5>');
                    });
                    // $('#saveBrand').removeClass('d-none');
                    // $('#spinner').addClass('d-none');
                }
            });
        });
    });
</script>
@endsection