@extends('user.layout.app')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60 mt-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="{{ route('customer.login') }}" method="POST" id="login_form">
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" name="email">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="{{ route('forget.password') }}"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="" method="POST" id="customer_register_form">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0" type="text" placeholder="First Name" name="f_name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" placeholder="Last Name" name="l_name">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" name="email">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password" name="con_pass">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->


@endsection
@section('script')
<script>
    $(document).ready(function(){

        // customer registration
        $(document).on('submit','#customer_register_form',function(){
            event.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url:'{{ route("customer.register") }}',
                method:'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                    toastr.success('Registration successfully, please login now !');
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