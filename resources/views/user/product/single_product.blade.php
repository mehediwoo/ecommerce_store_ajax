@extends('user.layout.app')
@section('meta')
<meta name="tag" content="{{ $product->p_meta_tags }}">
<meta name="size" content="{{ $product->p_size }}">
<meta name="color" content="{{ $product->p_color }}">
<meta name="description" content="{{ $product->p_meta_desc }}">
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">{{ $product->p_title }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{ asset('storage/'.$product->thumbnail) }}" data-gall="myGallery">
                                <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="product image">
                            </a>
                        </div>
                        @foreach (explode(',',$product->p_image) as $single_image)
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{ asset('storage/'.$single_image) }}" data-gall="myGallery">
                                <img src="{{ asset('storage/'.$single_image) }}" alt="product image">
                            </a>
                        </div>
                        @endforeach


                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        <div class="sm-image"><img src="{{ asset('storage/'.$product->thumbnail) }}" alt="product image thumb"></div>
                        @foreach (explode(',',$product->p_image) as $image)
                        <div class="sm-image"><img src="{{ asset('storage/'.$image) }}" alt="product image thumb"></div>
                        @endforeach
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{ $product->p_title }}</h2>
                        <span class="product-details-ref">
                            {{ $product->category->title }} ->
                            {{ $product->subcategory->title }} ->
                            {{ $product->childcategory->title ?? ''}}
                        </span>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">
                            {{ $footer->default_currency }} {{ number_format($product->p_discount_price,0,'',',') }}
                            </span>
                            <span style="color: black;" class="new-price new-price-2 ml-3"><s>
                                {{ $footer->default_currency }} {{ number_format($product->p_price,0,'',',') }}
                            </s> </span>
                        </div>
                        <div class="product-desc">
                            <p>
                                {{ $product->p_short_desc }}
                            </p>
                        </div>


                        <div class="single-add-to-cart">
                            <form action="" class="cart-quantity" id="catr_form">
                                <div class="color">
                                    <div class="form-group">
                                        <label for="">Size</label><br>
                                        <select name="color" class="">
                                            @foreach (explode(',',$product->p_size) as $size)
                                            <option value="{{ $size }}">{{ ucfirst($size) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="color">
                                    <div class="form-group">
                                        <label for="">Color</label> <br>
                                        <select name="color" class="">
                                            @foreach (explode(',',$product->p_color) as $color)
                                            <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="pro_id" value="{{ $product->id }}">
                                <input type="hidden" id="price" value="{{ $product->p_discount_price }}">
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text" id="quantity">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">Add to cart</button>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <a class="wishlist-btn" href=""><i class="fa fa-heart-o"></i>Add to wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                       <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                       <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>{!! $product->p_short_desc !!}</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    <a href="#">
                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="Product Manufacturer Image">
                    </a>
                    <p>{!! $product->p_desc !!}</p>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Grade</span>
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="comment-author-infos pt-25">
                            <span>HTML 5</span>
                            <em>01-12-18</em>
                        </div>
                        <div class="comment-details">
                            <h4 class="title-block">Demo</h4>
                            <p>Plaza</p>
                        </div>
                        <div class="review-btn">
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                        </div>
                        <!-- Begin Quick View | Modal Area -->
                        <div class="modal fade modal-wrapper" id="mymodal" >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">Write Your Review</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                               <div class="li-review-product">
                                                   <img src="{{ asset('user/images/product/large-size/3.jpg') }}" alt="Li's Product">
                                                   <div class="li-review-product-desc">
                                                       <p class="li-product-name">Today is a good day Framed poster</p>
                                                       <p>
                                                           <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                       </p>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <h3 class="feedback-title">Our Feedback</h3>
                                                            <form action="#">
                                                                <p class="your-opinion">
                                                                    <label>Your Rating</label>
                                                                    <span>
                                                                        <select class="star-rating">
                                                                          <option value="1">1</option>
                                                                          <option value="2">2</option>
                                                                          <option value="3">3</option>
                                                                          <option value="4">4</option>
                                                                          <option value="5">5</option>
                                                                        </select>
                                                                    </span>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Your Review</label>
                                                                    <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">Name<span class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author feedback-form-email">
                                                                        <label for="email">Email<span class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                        <span class="required"><sub>*</sub> Required fields</span>
                                                                    </p>
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                        <a href="#">Submit</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Quick View | Modal Area End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Similar products in the same category:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @if (!empty($similar_iteam) && $similar_iteam->count() > 0)
                        @foreach ($similar_iteam as $row)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{ route('view.product',$row->p_slug) }}">
                                        <img src="{{ asset('storage/'.$row->thumbnail) }}" alt="Li's Product Image">
                                    </a>
                                    @if ($row->created_at->gte(now()->subDays(10)))
                                    <span class="sticker">New</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="">{{ $row->category->title ?? '' }}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4>
                                            <a class="product_name" href="{{ route('view.product',$row->p_slug) }}">{{ $row->p_title }}</a>
                                        </h4>

                                        <div class="price-box">
                                            <span class="new-price new-price-2">
                                                {{ $footer->default_currency }} {{ number_format($row->p_discount_price,0,'',',') }}
                                            </span>
                                            <span class="old-price">
                                                {{ $footer->default_currency }} {{ number_format($row->p_price,0,'',',') }}
                                            </span>
                                            <span class="discount-percentage">
                                                {{ number_format(($row->p_discount_price - $row->p_price) / $row->p_price *100,2) }}%</span>
                                        </div>


                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active">
                                                <a id="addToCart" pro_id="{{ $row->id }}" quantity="1" price="{{ $row->p_discount_price }}">Add to cart</a>
                                            </li>

                                            <li>
                                                <a class="links-details" href="wishlist">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->

@endsection
