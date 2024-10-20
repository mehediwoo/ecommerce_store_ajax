@extends('admin.layout.app')
@section('title','Admin | Currency')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Currency</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Currency</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Currency</div>
                <div class="">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add +</a>
                </div>
            </div>




            <div class="px-5">
                <div class="table-product-filter d-sm-flex justify-content-between align-items-center text-color-muted mb-4">
                    <div class="select-product-entries text-nowrap d-flex align-items-center gap-1 mb-4 mb-sm-0">

                    </div>

                    {{-- <form action="">
                        <div class="search-box position-relative fs-3 overflow-hidden">
                            <input class="fs-4 w-100" type="search" name="" id="" placeholder="Search..."
                                style="min-width: 10rem">
                            <button type="submit"
                                class="btn fs-4 position-absolute top-0 end-0 h-100 px-4 pt-3 text-color-2">
                                <i class="fa-solid fa-magnifying-glass w-100 h-100"></i>
                            </button>
                        </div>
                    </form> --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-14 text-capitalize"
                        style="min-width: 90rem">
                        <thead>
                            <tr class="text-uppercase">
                                <td>SL</td>
                                <td>Currency Name</td>
                                <td>Currency Code</td>
                                <td>Currency Symble</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="currencyBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>
{{-- Add Modal  --}}
@include('admin.setting.currency.ajax.add')
@include('admin.setting.currency.ajax.edit')

@endsection
@section('script')
<script>
    // Load currency Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("currency.get") }}',
                success : function(data){
                    $('#currencyBody').html(data);
                }
            });
        }
        loadTable();
        // insert Category
        $(document).on('submit','#currencyForm',function(){
            event.preventDefault();
            $('#saveCurrency').addClass('d-none');
            $('#spinner').removeClass('d-none');
            let formData = new FormData(this);
            $.ajax({
                url: '{{ route("currency.store") }}',
                method: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(response){
                    $('#saveCurrency').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                    $('#addModal').modal('hide');
                    loadTable();
                    $('#currencyForm').trigger('reset');
                    Swal.fire(
                    'Good job! Currency added successfully!',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#saveCurrency').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                }
            });
        });
        // delete category
        $(document).on('click','#delete',function(){
            event.preventDefault();
            Swal.fire({
                title: 'Do you want to delete the iteam ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't delete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let id = $(this).attr('data');
                    $.ajax({
                        url:'{{ route("currency.delete") }}',
                        method:'POST',
                        data:{id:id},
                        success:function(data){
                            Swal.fire('Delete!', '', 'success');
                            $(this).closest('tr').fadeOut();
                            loadTable();
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Iteam is safe !', '', 'info')
                }
            });
        });
        // Edit modal
        $(document).on('click','#editCurrency',function(){
            event.preventDefault();
            let id     = $(this).attr('data');
            let name   = $(this).attr('c_name');
            let code   = $(this).attr('c_code');
            let symble = $(this).attr('c_symble');

            $('#c_id').val(id);
            $('#c_name').val(name);
            $('#c_code').val(code);
            $('#c_symble').val(symble);

            $('#editModal').modal('show')
        });
        // update modal
        $(document).on('submit','#currencyUpdateForm',function(){
            event.preventDefault();
            $('#updateCurrency').addClass('d-none');
            $('#c_spinner').removeClass('d-none');
            let formData = new FormData(this);
            $.ajax({
                url: '{{ route("currency.update") }}',
                method: 'POST',
                data:formData,
                contentType:false,
                processData: false,
                success:function(response){
                    $('#updateCurrency').removeClass('d-none');
                    $('#c_spinner').addClass('d-none');
                    $('#editModal').modal('hide');
                    $(this).closest('tr').fadeIn();
                    loadTable();
                    swal.fire('Update success!','success');

                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#updateCurrency').removeClass('d-none');
                    $('#c_spinner').addClass('d-none');
                }
            });
        });

    });


</script>
@endsection
