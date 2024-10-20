@extends('admin.layout.app')
@section('title','Admin | Pending Order')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Page</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pending Order</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Pending Order</div>
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
                                <td>Customer</td>
                                <td>Image</td>
                                <td>Product Name</td>
                                <td>Price </td>
                                <td>Mark as confirm</td>
                            </tr>
                        </thead>
                        <tbody id="orderBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>


@endsection
@section('script')
<script>
    // Load page Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("get.pending.order") }}',
                success : function(data){
                    $('#orderBody').html(data);
                }
            });
        }
        loadTable();

        // order mark as confirm
        $(document).on('click','#orderStatus',function(){
            event.preventDefault();
            Swal.fire({
                title: 'Do you want complete this order ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Complete',
                denyButtonText: `Don't Complete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let id = $(this).attr('data');
                    $.ajax({
                        url:'{{ route("order.status") }}',
                        data:{id:id},
                        success:function(data){
                            if(data==1){
                                Swal.fire('Order is confirmed!', '', 'success');
                                $(this).closest('tr').fadeOut();
                                loadTable();
                            }else{
                                Swal.fire('Iteam is not null!', '', 'error');
                                loadTable();
                            }
                            loadTable();
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Iteam is not complete !', '', 'info')
                }
            });
        });

    });


</script>
@endsection
