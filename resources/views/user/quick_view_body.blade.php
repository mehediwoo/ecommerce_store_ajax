<div class="modal-inner-area row">
    <div class="col-lg-5 col-md-6 col-sm-6">
        <!-- Product Details Left -->
        <div class="product-details-left">
            <div class="product-details-images slider-navigation-1">

                <div class="lg-image">
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="product image">
                </div>
                 
            </div>
            {{-- <div class="product-details-thumbs slider-thumbs-1">
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/1.jpg') }}" alt="product image thumb"></div>
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/2.jpg') }}" alt="product image thumb"></div>
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/3.jpg') }}" alt="product image thumb"></div>
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/4.jpg') }}" alt="product image thumb"></div>
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/5.jpg') }}" alt="product image thumb"></div>
                 <div class="sm-image"><img src="{{ asset('user/images/product/small-size/6.jpg') }}" alt="product image thumb"></div>
            </div> --}}
        </div>
        <!--// Product Details Left -->
    </div>
    
    <div class="col-lg-7 col-md-6 col-sm-6">
        <div class="product-details-view-content pt-60">
            <div class="product-info">
                <h2>{{ $product->p_title }}</h2>
                Category: <span class="product-details-ref">{{ $product->category->title.' -> '.$product->subcategory->title.' -> '.$product->childcategory->title ?? '' }}</span>
                <br>
                Brand: <span class="product-details-ref">{{ $product->brand->title }}</span>
                
                <div class="price-box pt-20">
                    <span class="new-price new-price-2">{{ $footer->default_currency.' '.number_format($product->p_discount_price) }}</span> 
                </div>

                <div class="product-desc">
                    <p>
                        <span>{{ $product->p_short_desc }}</span>
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
                    <a class="wishlist-btn" href="" id="addToWishlist" pro_id={{ $product->id }}>
                        <i class="fa fa-heart-o"></i>Add to wishlist
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>