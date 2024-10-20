@extends('admin.layout.app')
@section('title','Admin | Payment Method')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px; margin-top: 10%;
    margin-left: 40%;">
</div>

<div class="container d-none" id="mainContent">
    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Payment Method</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Method</li>
            </ol>
        </nav>
    </div>

    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Payment List</div>
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
                                <td class="py-3">Payment Method Title</td>
                                <td class="py-3">Payment Store ID</td>
                                <td class="py-3">Payment Signature Key</td>
                                <td class="py-3">date</td>
                                <td class="py-3">status</td>
                                <td class="py-3">action</td>
                            </tr>
                        </thead>
                        <tbody id="paymentBody">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- add modal-->
@include('admin.setting.payment.ajax.add')
@include('admin.setting.payment.ajax.edit')

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#loader').addClass('d-none');
            $('#mainContent').removeClass('d-none');

            // load table
            function loadTable(){
                $.ajax({
                    url: '{{ route("get.payment") }}',
                    success:function(response){
                        $('#paymentBody').html(response);
                        $('#dataTable').DataTable();
                    }
                });
            }
            loadTable();
            // insert brand
            $(document).on('submit','#paymentForm',function(event){
                event.preventDefault();
                let formData = new FormData(this);
                $('#savePayment').addClass('d-none');
                $('#spinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route("payment.store") }}',
                    method: 'POST',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#addModal').modal('hide');
                        $("#paymentForm").trigger('reset');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Payment Method Intigrate successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        loadTable();
                        $('#savePayment').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h3>'+value+'</h3>');
                        });
                        $('#savePayment').removeClass('d-none');
                        $('#spinner').addClass('d-none');
                    }
                });
            });
            // brand edit
            $(document).on('click','#editPayment',function(){
                event.preventDefault();
                let id   = $(this).attr('data');
                let pay_name = $(this).attr('pay_name');
                let store_id = $(this).attr('store_id');
                let sig_key = $(this).attr('sig_key');

                $('#payment_id').val(id);
                $('#payment_name').val(pay_name);
                $('#store_id').val(store_id);
                $('#signature_key').val(sig_key);

                $('#editModal').modal('show');
            });
            // Update category
            $(document).on('submit','#updatePaymentForm',function(event){
                event.preventDefault();
                $('#updatePayment').addClass('d-none');
                $('#PaymentSpinner').removeClass('d-none');
                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route("payment.update") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('#editModal').modal('hide');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#updatePayment').removeClass('d-none');
                        $('#PaymentSpinner').addClass('d-none');
                        loadTable();
                    },
                    error:function(error){
                        let err = error.responseJSON;
                        $.each(err.errors,function(index,value){
                            toastr.error('<h3>'+value+'</h3>');
                        });
                        $('#updatePayment').removeClass('d-none');
                        $('#PaymentSpinner').addClass('d-none');
                    }
                });
            });

            // brand delete
            $(document).on('click','#delete', function(event){
                event.preventDefault();
                let id = $(this).attr('payment_id');

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
                            url: '{{ route("payment.delete") }}',
                            data: {id:id},
                            success:function(response){
                                loadTable();
                                if (response==true) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                }else if(response==false){
                                    toastr.error('<h3>Something went wrong, please try again !</h3>')
                                }
                            }
                        });
                    }
                });
            });

            // Status
            $(document).on('click','#status', function(){
                let id = $(this).attr('payment_id');
                $.ajax({
                    url: "{{ route('payment.status') }}",
                    data:{id:id},
                    success:function(response){
                        toastr.success('<h3>Payment method is successfully activate</h3>');
                        loadTable();
                    }
                });
            });
        });
    </script>
@endsection