<div class="footer">
    <!-- Begin Footer Static Top Area -->
    <div class="footer-static-top">
        <div class="container">
            <!-- Begin Footer Shipping Area -->
            <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                <div class="row">
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('user/images/shipping-icon/1.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Free Delivery</h2>
                                <p>And free returns. See checkout for delivery dates.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('user/images/shipping-icon/2.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Safe Payment</h2>
                                <p>Pay with the world's most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('user/images/shipping-icon/3.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Shop with Confidence</h2>
                                <p>Our Buyer Protection covers your purchasefrom click to delivery.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('user/images/shipping-icon/4.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>24/7 Help Center</h2>
                                <p>Have a question? Call a Specialist or chat online.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                </div>
            </div>
            <!-- Footer Shipping Area End Here -->
        </div>
    </div>
    <!-- Footer Static Top Area End Here -->
    <!-- Begin Footer Static Middle Area -->
    <div class="footer-static-middle">
        <div class="container">
            <div class="footer-logo-wrap pt-50 pb-35">
                <div class="row">
                    <!-- Begin Footer Logo Area -->
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-logo">
                            <h1>{{ $footer->logo }}</h1>
                            <p class="info">
                                I'm PHP, Laravel , MYSQL & jquery ajax web developer. 
                            </p>
                        </div>
                        <ul class="des">
                            <li>
                                <span>Address: </span>
                                {{ $footer->address }}
                            </li>
                            <li>
                                <span>Phone: </span>
                                @foreach(explode(',',$footer->phone) as $phone)
                                    <a href="tel:{{$phone}}">{{ $phone }}</a>
                                @endforeach
                            </li>
                            <li>
                                <span>Email: </span>
                                <a href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                                @foreach(explode(',',$footer->email) as $email)
                                <a href="tel:{{$email}}">{{ $email }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Logo Area End Here -->
                    
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Follow Us</h3>
                            <ul class="social-link">

                                <li class="twitter">
                                    <a href="{{ $social->twitter }}" data-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>

                                <li class="rss">
                                    <a href="{{ $social->tiktok }}" data-toggle="tooltip" target="_blank" title="Tiktok">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>

                                <li class="google-plus">
                                    <a href="{{ $social->google }}" data-toggle="tooltip" target="_blank" title="Google">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>

                                <li class="facebook">
                                    <a href="{{ $social->facebook }}" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>

                                <li class="youtube">
                                    <a href="{{ $social->youtube }}" data-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>

                                <li class="instagram">
                                    <a href="{{ $social->instagram }}" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- Begin Footer Newsletter Area -->
                    </div>
                    <!-- Footer Block Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Middle Area End Here -->
    <!-- Begin Footer Static Bottom Area -->
    <div class="footer-static-bottom pt-55 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Footer Links Area -->
                    
                    <!-- Footer Links Area End Here -->
                    <!-- Begin Footer Payment Area -->
                    <div class="copyright text-center">
                        <a href="#">
                            <img src="{{ asset('user/images/payment.png') }}" alt="">
                        </a>
                    </div>
                    <!-- Footer Payment Area End Here -->
                    <!-- Begin Copyright Area -->
                    <div class="copyright text-center pt-25">
                        <span>
                            {!! $footer->copyright !!}
                        </span>
                    </div>
                    <!-- Copyright Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Bottom Area End Here -->
</div>
