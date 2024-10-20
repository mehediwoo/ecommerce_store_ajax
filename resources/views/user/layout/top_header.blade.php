<div class="header-top">
    <div class="container">
        <div class="row">
            <!-- Begin Header Top Left Area -->
            <div class="col-lg-6 col-md-6">
                <div class="header-top-left">
                    <ul class="phone-wrap">
                        <li>
                            <span>Telephone:</span>
                            @foreach(explode(',',$footer->phone) as $phone)
                            <a href="tel:{{$phone}}">{{ $phone }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Top Left Area End Here -->
            <!-- Begin Header Top Right Area -->
            <div class="col-lg-6 col-md-6">
                <div class="header-top-right">
                    <ul class="ht-menu">
                        <!-- Begin Setting Area -->
                        <li>
                            <div class="ht-setting-trigger"><span>Account</span></div>
                            <div class="setting ht-setting">
                                <ul class="ht-setting-list">
                                    @if(session()->has('email') && session()->has('name'))
                                    <li><a href="{{ route('customer.dashboard') }}">My Account</a></li>
                                    <li><a href="{{ route('billing') }}">Checkout</a></li>
                                    <li><a href="{{ route('customer.logout') }}">Log Out</a></li>
                                    @else
                                    <li><a href="{{ route('customer.authentication') }}">Sign In</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Top Right Area End Here -->
        </div>
    </div>
</div>
