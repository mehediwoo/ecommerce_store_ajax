@extends('admin.layout.app')
@section('title','Admin | Brand')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">
    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Brand</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand</li>
            </ol>
        </nav>
    </div>

    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Brand</div>
                <div class="">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add +</a>
                </div>
            </div>

            <div class="px-5">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-14 text-capitalize"
                        style="min-width: 90rem" id="dataTable">
                        <thead>
                            <tr class="text-uppercase">
                                <td class="py-3">S.L</td>
                                <td class="py-3">Logo</td>
                                <td class="py-3">title</td>
                                <td class="py-3">slug</td>
                                <td class="py-3">date</td>
                                <td class="py-3">status</td>
                                <td class="py-3">action</td>
                            </tr>
                        </thead>
                        <tbody id="categoryBody">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- add modal-->
@include('admin.brand.ajax.add')
@include('admin.brand.ajax.edit')

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#loader').addClass('d-none');
            $('#mainContent').removeClass('d-none');

            // load table
            function loadTable(){
                $.ajax({
                    url: '{{ route("get.brand") }}',
                    success:function(response){
                        $('#categoryBody').html(response);
                        $('#dataTable').DataTable();
                    }
                });
            }
            loadTable();
            // insert brand
            $(document).on('submit','#brandForm',function(event){
                event.preventDefault();
                let formData = new FormData(this);
                $('#saveBrand').addClass('d-none');
                $('#spinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route("brand.store") }}',
                    method: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#addModal').modal('hide');
                        $("#brandForm").trigger('reset');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Brand save successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        loadTable();
                        $('#saveBrand').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h3>'+value+'</h3>');
                        });
                        $('#saveBrand').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    }
                });
            });
            // brand edit
            $(document).on('click','#editBrand',function(){
                event.preventDefault();
                let id   = $(this).attr('data');
                let brandLogo = $(this).attr('brandLogo');
                let title = $(this).attr('title');

                //let logo_images ="{{ asset('storage') }}/"+ brandLogo;

                $('#brandId').val(id);

                $('#Btitle').val(title);

                // dropify
                var _newImageLink = "{{ asset('storage') }}/"+ brandLogo;;
                var drEvent = $('#Brandlogo').dropify(
                {
                    defaultFile: _newImageLink
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = _newImageLink;
                drEvent.destroy();
                drEvent.init();



                $('#editModal').modal('show');
            });
            // Update category
            $(document).on('submit','#updateBrandForm',function(event){
                event.preventDefault();
                $('#updateBrand').addClass('d-none');
                $('#Brandspinner').removeClass('d-none');
                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route("update.brand") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#editModal').modal('hide');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Brand updated successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#updateBrand').removeClass('d-none');
                        $('#Brandspinner').addClass('d-none');
                        loadTable();
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h3>'+value+'</h3>');
                        });
                        $('#updateBrand').removeClass('d-none');
                        $('#Brandspinner').addClass('d-none');
                    }
                });
            });

            // brand delete
            $(document).on('click','#delete', function(event){
                event.preventDefault();
                let id = $(this).attr('brand_id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("delete.brand") }}',
                            data: {id:id},
                            success:function(response){
                                loadTable();
                                if (response==true) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                }else{
                                    toastr.error('<h3>Iteam is not null !</h3>')
                                }
                            }
                        });
                    }
                });
            });

            // Status
            $(document).on('click','#status', function(){
                let id = $(this).attr('brand_id');
                $.ajax({
                    url: "{{ route('brand.status') }}",
                    data:{id:id},
                    success:function(response){
                        if (response==true) {
                            toastr.warning('<h3>Status disable successfully</h3>')
                        }else if(response==false){

                            toastr.success('<h3>Status enable successfully</h3>')
                        }
                        loadTable();
                    }
                });
            });
        });
    </script>
@endsection
