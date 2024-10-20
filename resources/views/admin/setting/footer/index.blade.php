@extends('admin.layout.app')
@section('title', 'Admin | Footer')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Settings</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                          Footer
                        </div>
                        <div class="card-body">
                            <form action="" id="footerForm">
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="text" name="logo" class="form-control" placeholder="(Only Text Logo Is Accepted)" value="{{ $footer_data->logo }}">
                                </div>
                                <!-- Default Currency-->
                                <div class="form-group mt-3">
                                    <label for="">Default Currency</label><br>
                                    <select name="d_currency" class="form-control">
                                        <option value="">Select default currency!</option>
                                        @if (!empty($d_currency) && $d_currency->count()>0)
                                        @foreach ($d_currency as $currency)
                                            @if ($footer_data->default_currency=== $currency->c_symbol)
                                            <option value="{{ $currency->c_symbol }}" selected>
                                                {{ $currency->c_code }} </option>
                                            @else
                                            <option value="{{ $currency->c_symbol }}">
                                                {{ $currency->c_code }}
                                            </option>
                                            @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Phone <small> (coma "," separetor)</small></label><br>
                                    <input type="text" name="phone" data-role='tagsinput' class="form-control" value="{{ $footer_data->phone }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">E-Mail <small> (coma "," separetor)</small></label><br>
                                    <input type="text" name="email" data-role='tagsinput' class="form-control" value="{{ $footer_data->email }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Address</label><br>
                                    <textarea name="address" id="" cols="3" rows="4" class="form-control">{{ $footer_data->address }}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Copyright</label><br>
                                    <textarea name="copyright" id="" cols="3" rows="4" class="form-control">{{ $footer_data->copyright }}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="submit" value="Save" class="btn btn-primary" id="saveBtn">
                                    <button class="btn btn-primary d-none" type="button" disabled id="f_spinner">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                        Social Links
                        </div>
                        <div class="card-body">
                            <form action="" id="socialForm">
                                <div class="form-group">
                                    <label for=""><i class="fa-brands fa-facebook"></i> Facebook</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="url is here..."  value="{{ $social_data->facebook }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-twitter"></i> Twitter</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="url is here..." value="{{ $social_data->twitter }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-square-instagram"></i> Instagram</label>
                                    <input type="text" name="instagram" class="form-control" placeholder="url is here..." value="{{ $social_data->instagram }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-tiktok"></i> Tiktok</label>
                                    <input type="text" name="tiktok" class="form-control" placeholder="url is here..." value="{{ $social_data->tiktok }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-linkedin"></i> Linked In</label>
                                    <input type="text" name="linkedin" class="form-control" placeholder="url is here..." value="{{ $social_data->linkedin }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-youtube"></i> Youtube</label>
                                    <input type="text" name="youtube" class="form-control" placeholder="url is here..." value="{{ $social_data->youtube }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for=""><i class="fa-brands fa-google"></i> Google</label>
                                    <input type="text" name="google" class="form-control" placeholder="url is here..." value="{{ $social_data->google }}">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Save" class="btn btn-primary" id="socialBtn">
                                    <button class="btn btn-primary d-none" type="button" disabled id="social_spinner">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
                <!-- slider -->
                <div class="col-md-6 mt-4">
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                        Banner
                        </div>
                        <div class="card-body">
                            <form action="" id="bannerForm">
                                <div class="form-group">
                                    <label>Banner Headline..</label>
                                    {{-- <input type="text" name="headline" value="{{ $banner_data->headline }}" class="form-control"> --}}
                                </div>
                                <div class="form-group">
                                    <label>Banner Background Images</label>
                                    <input type="file" name="banner" class="dropify">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Save" class="btn btn-primary" id="bannerBtn">
                                    <button class="btn btn-primary d-none" type="button" disabled id="banner_spinner">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>
{{-- Add Modal  --}}
@include('admin.page.ajax.add')
@include('admin.page.ajax.edit')

@endsection
@section('script')
<script>

    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');

        // update footer data
        $(document).on('submit','#footerForm',function(){
            event.preventDefault();
            $('#saveBtn').addClass('d-none');
            $('#f_spinner').removeClass('d-none');
            let formData= new FormData(this);
            $.ajax({
                url: '{{ route("footer.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#saveBtn').removeClass('d-none');
                    $('#f_spinner').addClass('d-none');
                    Swal.fire(
                    'Good job! Footer successfully save!',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#saveBtn').removeClass('d-none');
                    $('#f_spinner').addClass('d-none');
                }
            });
        });
        // update social data
        $(document).on('submit','#socialForm',function(){
            event.preventDefault();
            $('#socialBtn').addClass('d-none');
            $('#social_spinner').removeClass('d-none');
            let formData= new FormData(this);
            $.ajax({
                url: '{{ route("social.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#socialBtn').removeClass('d-none');
                    $('#social_spinner').addClass('d-none');
                    Swal.fire(
                    'Good job! Social media save successfully !',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#socialBtn').removeClass('d-none');
                    $('#social_spinner').addClass('d-none');
                }
            });
        });
        // Banner
        $(document).on('submit','#bannerForm',function(){
            event.preventDefault();
            $('#bannerBtn').addClass('d-none');
            $('#banner_spinner').removeClass('d-none');
            let formData= new FormData(this);
            $.ajax({
                url: '{{ route("banner.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#bannerBtn').removeClass('d-none');
                    $('#banner_spinner').addClass('d-none');
                    Swal.fire(
                    'Good job! Banner successfully save!',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#bannerBtn').removeClass('d-none');
                    $('#banner_spinner').addClass('d-none');
                }
            });
        });

    });


</script>
@endsection
