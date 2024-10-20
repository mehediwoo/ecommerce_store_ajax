@php
$customer_id = session()->get('customer_id');
$wishlist = App\Models\wishlist::where('customer_id',$customer_id)->count();    
@endphp
<div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
    <div class="container">
        <div class="row">
            <!-- Begin Header Logo Area -->
            <div class="col-lg-3">
                <div class="logo pb-sm-30 pb-xs-30">
                    <a href="{{ route('home') }}">
                        <h1>{{ $footer->logo }}</h1>
                    </a>
                </div>
            </div>
            <!-- Header Logo Area End Here -->
            <!-- Begin Header Middle Right Area -->
            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                <!-- Begin Header Middle Searchbox Area -->
                <form action="#" class="hm-searchbox">
                    <select class="nice-select select-search-category" name="category_product">
                        <option value="0">All</option>
                        @if (!empty($all_category) && $all_category->count() > 0)
                            @foreach ($all_category as $cat_row)
                                <option value="{{ $cat_row->slug }}">{{ $cat_row->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <input type="text" placeholder="Enter your search key ...">
                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <!-- Header Middle Searchbox Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="header-middle-right">
                    <ul class="hm-menu">
                        <!-- Begin Header Middle Wishlist Area -->
                        <li class="hm-wishlist">
                            @if(session()->has('customer_id'))
                            <a href="{{ route('view.wishlist') }}">
                                <span class="cart-item-count wishlist-item-count">{{ $wishlist }}</span>
                                <i class="fa fa-heart-o"></i>
                            </a>
                            @else
                            <a href="{{ route('view.wishlist') }}">
                                <span class="cart-item-count wishlist-item-count">0</span>
                                <i class="fa fa-heart-o"></i>
                            </a>
                            @endif
                        </li>
                        <!-- Header Middle Wishlist Area End Here -->
                        <!-- Begin Header Mini Cart Area -->
                        <li class="hm-minicart">

                            <div class="hm-minicart-trigger">
                                <span class="item-icon"></span>
                                <span class="item-text" id="total_ammount" >
                                    {{ $footer->default_currency }}
                                    @if (session()->has('cart'))
                                    <span class="cart-item-count">{{ count(session()->get('cart')) }}</span>
                                    @else
                                    <span class="cart-item-count">0</span>
                                    @endif

                                </span>
                            </div>

                            <span></span>
                            <div class="minicart" id="cart_iteams">

                            </div>
                        </li>
                        <!-- Header Mini Cart Area End Here -->
                    </ul>
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
            <!-- Header Middle Right Area End Here -->
        </div>
    </div>
</div>
