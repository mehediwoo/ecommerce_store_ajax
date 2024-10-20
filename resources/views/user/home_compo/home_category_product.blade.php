<section class="product-area li-laptop-product li-laptop-product-2 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            @if (!empty($home_category) && $home_category->count() > 0)
            @foreach ($home_category as $row)
            <div class="col-lg-12">
                <div class="li-section-title mt-3">
                    <h2>
                        <span>{{ $row->title }}</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        @foreach ($row->sub_category->take(3) as $sub_category)
                        <li class="active"><a href="{{ $sub_category->slug }}">{{ $sub_category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($row->home_category_product->take(20) as $product)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{ route('view.product',$product->p_slug) }}">
                                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="Li's Product Image">
                                    </a>
                                    @if ($product->created_at->gte(now()->subDays(10)))
                                    <span class="sticker">New</span>
                                    @endif

                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="">{{ $product->childcategory->title ?? '' }}</a>
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
                                            <a class="product_name" href="{{ route('view.product',$product->p_slug) }}">{{ $product->p_title }}</a>
                                        </h4>

                                        <div class="price-box">
                                            <span class="new-price new-price-2">
                                                {{ $footer->default_currency }} {{ number_format($product->p_discount_price,0,'',',') }}
                                            </span>
                                            <span class="old-price">
                                                {{ $footer->default_currency }} {{ number_format($product->p_price,0,'',',') }}
                                            </span>
                                            <span class="discount-percentage">
                                                {{ number_format(($product->p_discount_price - $product->p_price) / $product->p_price *100,2) }}%</span>
                                        </div>


                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active">
                                                <a id="addToCart" pro_id="{{ $product->id }}" quantity="1" price="{{ $product->p_discount_price }}">Add to cart</a>
                                            </li>

                                            <li>
                                                <a class="links-details" href="" id="addToWishlist" pro_id={{ $product->id }}>
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#quickViewModal" pro_id="{{ $product->id }}" id="quick_view">
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
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
