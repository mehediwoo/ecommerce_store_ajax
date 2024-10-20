@extends('admin.layout.app')
@section('title', 'Admin | Product')
@section('content')

<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Product</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">Product iteam</div>
                <div class="" style="cursor: pointer">
                    <a style="cursor: pointer" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add +</a>
                </div>
            </div>

            <div class="px-5">
                <div class="table-product-filter d-sm-flex justify-content-between align-items-center text-color-muted mb-4">
                    <div class="select-product-entries text-nowrap d-flex align-items-center gap-1 mb-4 mb-sm-0">

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-14 text-capitalize"
                        style="min-width: 90rem" id="dataTable">
                        <thead>
                            <tr class="text-uppercase">
                                <td>SL</td>
                                <td width="35%">Title</td>
                                <td width="5%">Code</td>
                                <td width="5%">Image</td>
                                <td width="10%">Cost</td>
                                <td width="10%">Price</td>
                                <td width="10%">Quantity</td>
                                <td width="10%">Status</td>
                                <td width="20%">Action</td>
                            </tr>
                        </thead>
                        <tbody id="productBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>
{{-- Add Modal  --}}
@include('admin.product.ajax.add')
@include('admin.product.ajax.edit')
@include('admin.product.ajax.quick_view')

@endsection
@section('script')
<script>
    $(document).ready(function(){

        // get sub category to category
        $(document).on('change','#p_cat',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getSubCat') }}",
                data:{id:id},
                success:function(data){
                    $('#subcat').empty();
                    $('#childCat').empty();
                    $('#subcat').append('<option value="">Choose sub category</option>');
                    $.each(data,function(key,value){
                        $('#subcat').append('<option value='+value.id+'>'+value.title+'</option>');
                    });
                }
            });
        });
        // get child category to sub category
        $(document).on('change','#subcat',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getChildCat') }}",
                data:{id:id},
                success:function(data){
                    $('#childCat').empty();
                    $.each(data,function(key,value){
                        $('#childCat').append('<option value='+value.id+'>'+value.title+'</option>')
                    });
                }
            });
        });

    });
    // Get category & sub category for edit
    $(document).ready(function(){

        // get sub category to category
        $(document).on('change','#edit_p_cat',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getSubCat') }}",
                data:{id:id},
                success:function(data){
                    $('#editsubcat').empty();
                    $('#edit_childCat').empty();
                    $.each(data,function(key,value){
                        $('#editsubcat').append('<option value='+value.id+'>'+value.title+'</option>');
                    });
                }
            });
        });
        // get child category to sub category
        $(document).on('change','#editsubcat',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getChildCat') }}",
                data:{id:id},
                success:function(data){
                    $('#edit_childCat').empty();
                    $.each(data,function(key,value){
                        $('#edit_childCat').append('<option value='+value.id+'>'+value.title+'</option>')
                    });
                }
            });
        });

    });
    // Load product Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("product.show") }}',
                success : function(data){
                    $('#productBody').html(data);
                    $('#dataTable').DataTable();
                }
            });
        }
        loadTable();
        // insert product
        $(document).on('submit','#productForm',function(event){
            event.preventDefault();
            $('#saveProduct').addClass('d-none');
            $('#p_spinner').removeClass('d-none');
            let formData = new FormData(this);
            $.ajax({
                url: '{{ route("pro.store") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#saveProduct').removeClass('d-none');
                    $('#p_spinner').addClass('d-none');
                    $('#addModal').modal('hide');
                    loadTable();
                    $('#productForm').trigger('reset');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Good job! Product added successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h4>'+value+'</h4>');
                    });
                    $('#saveProduct').removeClass('d-none');
                    $('#p_spinner').addClass('d-none');
                }
            });
        });
        // delete Product
        $(document).on('click','#deleteProduct',function(){
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let id = $(this).attr('data');
                        $.ajax({
                            url:'{{ route("pro.delete") }}',
                            data:{id:id},
                            success:function(data){
                                if(data==true){
                                    Swal.fire('Delete!', '', 'success');
                                    $(this).closest('tr').fadeOut();
                                    loadTable();
                                }else{
                                    Swal.fire('Iteam is not null!', '', 'error');
                                    loadTable();
                                }
                            }
                        });
                    }
                });
        });
        // Edit product modal
        $(document).on('click','#editProduct',function(){
            event.preventDefault();
            let id   = $(this).attr('data');
            let title = $(this).attr('title');
            let catName = $(this).attr('cat_name');
            let catId = $(this).attr('cat_id');
            let subcatName = $(this).attr('subCat_name');
            let subcatId = $(this).attr('subCat_id');
            let childcatName = $(this).attr('childCat_name');
            let childcatId = $(this).attr('childCat_id');
            let brandName = $(this).attr('brand_name');
            let brandId = $(this).attr('brand_id');
            let units = $(this).attr('units');
            let tags = $(this).attr('tag');
            let size = $(this).attr('size');
            let color = $(this).attr('color');
            let qty = $(this).attr('qty');
            let alrt_qty = $(this).attr('alrt_qty');
            let p_cost = $(this).attr('cost');
            let price = $(this).attr('price');
            let d_price = $(this).attr('d_price');
            let meta_desc = $(this).attr('meta_desc');
            let short_desc = $(this).attr('short_desc');
            let desc = $(this).attr('desc');
            let thumbnail = $(this).attr('thumbnail');
            let multipleImg = $(this).attr('multipleImg');
            let feature = $(this).attr('p_feature');
            let hot_deal = $(this).attr('hot_deal');
            let today_deal = $(this).attr('today_deal');
            let flash_deal = $(this).attr('flash_deal');
            let show_on_slider = $(this).attr('show_on_slider');
            let treandy = $(this).attr('treandy');

            $('#p_id').val(id);
            $('#p_title').val(title);
            $('#current_cat').html(catName);
            $('#current_cat').val(catId);
            $('#current_subcat').html(subcatName);
            $('#current_subcat').val(subcatId);
            $('#current_childcat').html(childcatName);
            $('#current_childcat').val(childcatId);
            $('#brand').html(brandName);
            $('#brand').val(brandId);
            $('#p_tags').val(tags);
            $('#p_units').val(units);
            $('#size').val(size);
            $('#color').val(color);
            $('#qty').val(qty);
            $('#alrt_qty').val(alrt_qty);
            $('#cost').val(p_cost);
            $('#price').val(price);
            $('#d_price').val(d_price);
            $('#meta_desc').val(meta_desc);
            $('#short_desc').val(short_desc);
            $('#summernote2').summernote('code',desc);
            let mainThumb = "{{ asset('storage') }}/"+thumbnail;
            // Dropify image view
            var drEvent = $('#product_image').dropify(
                {
                    defaultFile: mainThumb
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = mainThumb;
                drEvent.destroy();
                drEvent.init();

            let data =multipleImg.split(',');
            $('.allMultiIMg').empty();
            $.each(data,function(key,value){
                let mulThumb = "{{ asset('storage') }}/"+value;
                $('.allMultiIMg').append("<img src="+mulThumb+" style='height:80px' >");
            });
            // checkbox unchack
            $("#p_feature").prop("checked", false)
            $("#hot_deal").prop("checked", false)
            $("#show_on_slider").prop("checked", false)
            if (feature =='on') {
                $("#p_feature").prop("checked", true)
            }
            if(hot_deal =='on'){
                $("#hot_deal").prop("checked", true)
            }
            if(show_on_slider =='on'){
                $("#show_on_slider").prop("checked", true)
            }

            $('#editModal').modal('show');
            $('#p_tags').show();
            $('#size').show();
            $('#color').show();

        });
        // update product
        $(document).on('submit','#updateForm',function(){
            event.preventDefault();
            $('#updateProduct').addClass('d-none');
            $('#updateSpinner').removeClass('d-none');
            let formData= new FormData(this);

            $.ajax({
                url: '{{ route("pro.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#updateProduct').removeClass('d-none');
                    $('#updateSpinner').addClass('d-none');
                    $('#editModal').modal('hide');
                    loadTable();
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Product updated successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });

                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#updateProduct').removeClass('d-none');
                    $('#updateSpinner').addClass('d-none');
                }
            });
        });
        // change status
        $(document).on('click','#productStatus',function(){
            let id = $(this).attr('data');
            $.ajax({
                url: '{{ route("pro.status") }}',
                data: {id:id},
                success: function(data){
                    if (data==1) {
                        toastr.success('<h3>Product is enable!</h3>');
                    }else{
                        toastr.warning('<h3>Product is disable!</h3>');
                    }
                    loadTable();
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error('<h3>'+value+'</h3>');
                    });
                }
            });
        });

        // quick view product modal
        $(document).on('click','#viewProduct',function(event){
            event.preventDefault();
            $('#quick_view').modal('show');
            // get data
            let title = $(this).attr('title');
            let category = $(this).attr('cat_name');
            let sub_cat = $(this).attr('subCat_name');
            let child_cat = $(this).attr('childCat_name');
            let brand = $(this).attr('brand_name');
            let tag = $(this).attr('tag');
            let size = $(this).attr('size');
            let color = $(this).attr('color');
            let unit = $(this).attr('units');
            let qty = $(this).attr('qty');
            let alrt_qty = $(this).attr('alrt_qty');
            let cost = $(this).attr('cost');
            let price = $(this).attr('price');
            let d_price = $(this).attr('d_price');
            let feature = $(this).attr('p_feature');
            let hot_deal = $(this).attr('hot_deal');
            let short_desc = $(this).attr('short_desc');
            let desc = $(this).attr('desc');
            let thumbnails = $(this).attr('thumbnail');
            let multipleImg = $(this).attr('multipleImg');


            // set data
            $('#title').html(title);
            $('#category').html(category);
            $('#sub_cat').html(sub_cat);
            $('#child_cat').html(child_cat);
            $('#brands').html(brand);
            //Product Tags
            let allTags= tag.split(',');
            $('#tags').empty();
            $.each(allTags,function(index,value){
                $('#tags').append('<span class="badge bg-secondary" style="margin-left:3px">'+value+'</span>')
            });
            // product size
            let allSize = size.split(',');
            $('#sizes').empty();
            $.each(allSize,function(index,value){
                $('#sizes').append('<span class="badge bg-secondary" style="margin-left:3px">'+value+'<span>')
            });
            // product color
            let allColor = color.split(',');
            $('#colors').empty();
            $.each(allColor,function(index,value){
                $('#colors').append('<span class="badge bg-secondary" style="margin-left:3px">'+value+'<span>')
            });
            $('#units').html(unit);
            $('#quantity').html(qty);
            $('#alert_quantity').html(alrt_qty);
            $('#costs').html(cost);
            $('#prices').html(price);
            $('#d_prices').html(d_price);

            // checkbox unchack
            if (feature =='on') {
                $("#feature").html('Yes')
            }else{
                $("#feature").html('No')
            }
            if(hot_deal =='on'){
                $("#hot_deals").html('Yes')
            }else{
                $("#hot_deals").html('No')
            }
            $('#short_descr').html(short_desc);
            $('#long_desc').html(desc);
            let single_thumb = "{{ asset('storage') }}/"+thumbnails;
            $('#mainThumb').attr("src",single_thumb);

            let multi_thumbs = multipleImg.split(',');
            $('#multiple_thumb').empty();
            $.each(multi_thumbs,function(key,value){
                let mulThumb = "{{ asset('storage') }}/"+value;
                $('#multiple_thumb').append(
                    "<div class='carousel-item'><img src="+mulThumb+" class='d-block w-100' ></div>"
                );
            });

        });

    });


</script>
@endsection
