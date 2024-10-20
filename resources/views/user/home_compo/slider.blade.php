<style>
    .bg-4{
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 150px;
        min-height: 475px;
        width: 100%;
        height: 300px;
    }
    /* .owl-carousel .owl-item img {
    display: block;
    width: 440px;
    margin-left: 390px;
    } */
</style>
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Category Menu Area -->
            <div class="col-lg-3">
                <!--Category Menu Start-->
                <div class="category-menu">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>categories</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        <ul>
                            @if (!empty($category) && $category->count() > 0)
                            @foreach ($category as $key => $row)
                            <li class="right-menu">
                                <a href="{{ route('category.product',$row->slug) }}">{{ $row->title }}</a>
                                @if ($row->sub_category->count() > 0)
                                <ul class="cat-mega-menu">
                                    @foreach ($row->sub_category as $sub_category)
                                    <li class="right-menu cat-mega-title">
                                        <a href="{{ route('sub.cat.pro',$sub_category->slug) }}">{{ $sub_category->title }}</a>
                                        <ul>
                                            @foreach ($sub_category->child_category as $child_cate)
                                            <li>
                                                <a href="{{ route('child.cat.pro',$child_cate->slug) }}">{{ $child_cate->title }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @else
                            <li style="color: red">There are no category found !</li>
                            @endif
                        </ul>
                    </div>
                </div>
                    <!--Category Menu End-->
                </div>
                <!-- Category Menu Area End Here -->
                <!-- Begin Slider Area -->
                <div class="col-lg-9">
                    <div class="slider-area pt-sm-30 pt-xs-30">
                        <div class="slider-active owl-carousel">

                            @if (!empty($slide_product) && $slide_product->count() > 0)
                            @foreach ($slide_product as $key=>$row)

                            <div class="single-slide align-center-left animation-style-02 bg-4">
                                <img src="{{ asset("storage/".$row->thumbnail) }}" alt="">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>-20% Off</span> This Week</h5> <span id="slide_img" data-img="{{ $row->thumbnail }}"></span>
                                    <h2>{{ $row->p_title }}</h2>
                                    <h3>Discount price at <span>{{ $footer->default_currency }} {{ number_format($row->p_discount_price,0,'',',') }}</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="{{ route('view.product',$row->p_slug) }}">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- Begin Single Slide Area -->


                        </div>
                    </div>
                </div>
                <!-- Slider Area End Here -->
            </div>
        </div>
    </div>
