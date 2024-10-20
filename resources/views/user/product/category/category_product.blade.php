@extends('user.layout.app')
@section('title',ucfirst($slug).' Product | '.'Limupa Store')
@section('content')
<input type="hidden" id="catSlug" value="{{ $slug }}">
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Category / {{ ucfirst($slug) }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->

<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{ asset('user/images/bg-banner/2.jpg') }}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        {{-- <div class="toolbar-amount">
                            <span>Showing 1 to 15 of 15</span>
                        </div> --}}
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select" id="product_filter">
                                <option value="latest">Latest to Oldest</option>
                                <option value="oldestToLatest">Oldest to Latest</option>
                                <option value="price_high_low">Price (High to Low)</option>
                                <option value="price_low_high">Price (Low &gt; High)</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content" id="productBody">

                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                    <div class="sidebar-title">
                        <h2>Category</h2>
                    </div>
                    <!-- category-sub-menu start -->
                    <div class="category-sub-menu">
                        <ul>
                            @if (!empty($all_cat))
                            @foreach ($all_cat as $category)
                            <li class="has-sub"><a href="{{ route('category.product',$category->slug) }}">{{ $category->title }}</a>
                                <ul>
                                    @foreach ($category->sub_category as $sub_category)
                                    <li><a href="">{{ $sub_category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Brand</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    @if (!empty($brand) && $brand->count() > 0)
                                    @foreach ($brand as $row)
                                    <li>
                                        <a href="" id="brand" b_id="{{ $row->id }}">{{ $row->title }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </form>
                        </div>
                     </div>
                    <!-- filter-sub-area end -->

                    {{-- <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Size</h5>
                        <div class="size-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end --> --}}
                    {{-- <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Color</h5>
                        <div class="color-categoriy">
                            <form action="#">
                                <ul>
                                    <li><span class="white"></span><a href="#">White (1)</a></li>
                                    <li><span class="black"></span><a href="#">Black (1)</a></li>
                                    <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                    <li><span class="Blue"></span><a href="#">Blue  (2) </a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end --> --}}
                    <!-- filter-sub-area start -->
                    {{-- <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                        <h5 class="filter-sub-titel">Dimension</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">40x60cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">60x90cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">80x120cm (6)</a></li>
                                </ul>
                            </form>
                        </div>
                     </div> --}}
                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!-- category-sub-menu start -->
                {{-- <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                    <div class="sidebar-title">
                        <h2>Laptop</h2>
                    </div>
                    <div class="category-tags">
                        <ul>
                            <li><a href="# ">Devita</a></li>
                            <li><a href="# ">Cameras</a></li>
                            <li><a href="# ">Sony</a></li>
                            <li><a href="# ">Computer</a></li>
                            <li><a href="# ">Big Sale</a></li>
                            <li><a href="# ">Accessories</a></li>
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->
@endsection

@section('script')
<script>
    $(document).ready(function(){
        // load product table
        function loadTable(){
            let slug= $('#catSlug').val();
            $.ajax({
                url:"{{ route('get.category.product') }}",
                data:{slug,slug},
                success:function(data){
                    $('#productBody').html(data);
                }
            });
        }
        loadTable();

        // product filter
        $(document).on('change','#product_filter',function(){
            let filter = $(this).val();
            let slug= $('#catSlug').val();
            $.ajax({
                url:"{{ route('product.filter') }}",
                data:{filter:filter,slug:slug},
                success:function(data){
                    $('#productBody').html(data);
                }
            });
        });

        $(document).on('click','#brand',function(){
            event.preventDefault();
            let brand_id = $(this).attr('b_id');
            $.ajax({
                url:"{{ route('product.filter.brand') }}",
                data:{brand_id,brand_id},
                success:function(data){
                    $('#productBody').html(data);
                }
            });
        });

        // pagination
        $(document).on('click','.pagination a',function(){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            pagination(page);
        });
        function pagination(page){
            let slug= $('#catSlug').val();
            $.ajax({
                url: '/cate-product?page='+page,
                data:{slug,slug},
                success:function(data){
                    $('#productBody').html(data);
                }
            });
        }
    });
</script>
@endsection
