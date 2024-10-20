@extends('user.layout.app')
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">My Profile</li>
            </ul>
        </div>
    </div>
</div>

<div class="container mt-30 mb-30">
    <div class="row">
        <div class="col-md-4">
            <!-- Profile -->
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://surl.li/wiuanu" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Mehedi Hasan</h5>
                  <small class="text-mute" style="text-decoration: underline">Sidebar Menu</small>
                  <ul>
                    <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('pending.order') }}">Pending Order</a></li>
                    <li><a href="{{ route('complete.order') }}">Complete Order</a></li>
                    <li><a href="{{ route('customer.logout') }}">Log Out</a></li>
                </ul>
                </div>
            </div>

            
        </div>
        <div class="col-md-8">
            @yield('profileContent')
        </div>
    </div>
</div>

@endsection