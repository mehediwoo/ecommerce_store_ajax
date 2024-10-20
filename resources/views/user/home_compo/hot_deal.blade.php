<section class="product-area li-laptop-product Special-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Hot Deal's Products</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="special-product-active owl-carousel">
                        @if (!empty($hot_deal) && $hot_deal->count() > 0)
                        @foreach ($hot_deal as $row)
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
                                                <a href="{{ route('category.product',$row->category->slug) }}">{{ $row->category->title ?? '' }}</a>
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
                                                <a class="links-details" href="" id="addToWishlist" pro_id={{ $row->id }}>
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#quickViewModal" pro_id="{{ $row->id }}" id="quick_view">
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
