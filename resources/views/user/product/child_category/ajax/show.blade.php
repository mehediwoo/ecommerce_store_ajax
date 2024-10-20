<div id="grid-view" class="tab-pane fade active show" role="tabpanel">
    <div class="product-area shop-product-area">
        <div class="row">
            @if (!empty($product) && $product->count() > 0)
            @foreach ($product as $row)
            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                <!-- single-product-wrap start -->
                <div class="single-product-wrap">
                    <div class="product-image">
                        <a href="single-product.html">
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
                                <li class="add-cart active"><a href="shopping-cart.html">Add to cart</a></li>
                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
<div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
    <div class="row">
        <div class="col">
            @if (!empty($product) && $product->count() > 0)
            @foreach ($product as $row)
            <div class="row product-layout-list">
                <div class="col-lg-3 col-md-5 ">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="{{ asset('storage/'.$row->thumbnail) }}" alt="Li's Product Image">
                        </a>
                        @if ($row->created_at->gte(now()->subDays(10)))
                        <span class="sticker">New</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-md-7">
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
                                <a class="product_name" href="{{ route('view.product',$row->p_slug) }}">{{ $row->p_title }}fddfhdf</a>
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
                            <p>{{ Str::substr($row->p_short_desc, 0, 150) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shop-add-action mb-xs-30">
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
            @endforeach
            @endif
        </div>
    </div>
</div>
<div style="margin-top: 100px">
    {!! $product->links() !!}
</div>
{{-- <div class="paginatoin-area">
    <div class="row">
        <div class="col-lg-6 col-md-6 pt-xs-15">
            <p>Showing 1-12 of 13 item(s)</p>
        </div>
        <div class="col-lg-6 col-md-6">
            <ul class="pagination-box pt-xs-20 pb-xs-15">
                <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>
                  <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div> --}}
