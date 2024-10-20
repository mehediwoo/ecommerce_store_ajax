@extends('admin.layout.app')
@section('title','Admin | Child-Category')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">
    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Child Category</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Child Category</li>
            </ol>
        </nav>
    </div>

    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Child Category</div>
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
                                <td class="py-3"width='20%'>title</td>
                                <td class="py-3"width='20%'>slug</td>
                                <td class="py-3">parent sub-category</td>
                                <td class="py-3" width='15%'>date</td>
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
@include('admin.child_category.ajax.add')
@include('admin.child_category.ajax.edit')

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#loader').addClass('d-none');
            $('#mainContent').removeClass('d-none');

            // load table
            function loadTable(){
                $.ajax({
                    url: '{{ route("get.child.cat") }}',
                    success:function(response){
                        $('#categoryBody').html(response);
                        $('#dataTable').DataTable();
                    }
                });
            }
            loadTable();
            // insert category
            $(document).on('submit','#childCatForm',function(event){
                event.preventDefault();
                let formData = new FormData(this);
                $('#saveChildCate').addClass('d-none');
                $('#spinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route("child.cat.store") }}',
                    method: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#addModal').modal('hide');
                        $("#childCatForm").trigger('reset');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Child category save successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        loadTable();
                        $('#saveChildCate').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h4>'+value+'</h4>');
                        });
                        $('#saveChildCate').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    }
                });
            });
            // child category edit
            $(document).on('click','#edit',function(event){
                event.preventDefault();
                let id = $(this).attr('child_cat_id');
                let sub_cat_id = $(this).attr('sub_cat_id');
                let sub_cat_title = $(this).attr('sub_cat_title');
                let title = $(this).attr('title');

                $('#childCateId').val(id);
                $('#currentChildCat').html(sub_cat_title);
                $('#currentChildCat').val(sub_cat_id);
                $('#editTitle').val(title);
            });
            // Update category
            $(document).on('submit','#updateChildCatForm',function(event){
                event.preventDefault();
                $('#updateChildCate').addClass('d-none');
                $('#UpdateSpinner').removeClass('d-none');
                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route("update.child.cat") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#editModal').modal('hide');
                        loadTable();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Sub Category updated successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#updateChildCate').removeClass('d-none');
                        $('#UpdateSpinner').addClass('d-none');

                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h3>'+value+'</h3>');
                        });
                        $('#updateChildCate').removeClass('d-none');
                        $('#UpdateSpinner').addClass('d-none');
                    }
                });
            });
            // Iteam delete
            $(document).on('click','#delete', function(event){
                event.preventDefault();
                let id = $(this).attr('child_cat_id');

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
                            url: '{{ route("delete.child.cat") }}',
                            data: {id:id},
                            success:function(response){
                                loadTable();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        });
                    }
                });
            });

            // Status
            $(document).on('click','#status', function(){
                let id = $(this).attr('child_cat_id');
                $.ajax({
                    url: "{{ route('child.cat.status') }}",
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
