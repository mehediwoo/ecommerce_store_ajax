@extends('admin.layout.app')
@section('title','Dashboard')
@section('content')
<div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
    <h2 class="mb-2 mb-sm-0">Dashboard</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>


<!-- Count Cards Start Here -->
<div class="count-cards mb-5">
    <div class="row g-5 g-lg-4 g-xxl-5">

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">category</h5>
                <h1 class="fw-semibold">{{ $category }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">sub category</h5>
                <h1 class="fw-semibold">{{ $sub_category }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">child category</h5>
                <h1 class="fw-semibold">{{ $child_category }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total brand</h5>
                <h1 class="fw-semibold">{{ $brand }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total products</h5>
                <h1 class="fw-semibold">{{ $product }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total pending ammount</h5>
                <h1 class="fw-semibold">৳ {{ number_format($pending_ammount->sum('p_price')) }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total confirm ammount</h5>
                <h1 class="fw-semibold">৳ {{ number_format($confirm_ammount->sum('p_price')) }}</h1>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total customer</h5>
                <h1 class="fw-semibold">{{ $customer }}</h1>
            </div>
        </div>

    </div>
</div>
<!-- Count Cards End Here -->
</div>


@endsection
