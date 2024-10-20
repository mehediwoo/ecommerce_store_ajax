@extends('user.profile.layout')
@section('profileContent')
<h3>Pending Order</h3>

<div class="row">
    <div class="col-md-12">
        <p>All pending order</p>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Information</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if (!empty($pending_order))
                    @foreach ($pending_order as $key=>$iteam)
                    @php
                        $total = $total + $iteam->p_qty * $iteam->p_price;
                    @endphp
                    
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            <p>{{ session()->get('name') }}</p>
                            <small>{{ session()->get('email') }}</small><br>
                            <small>{{ $iteam->c_phone }}</small><br>
                            <small>{{ $iteam->c_city }}</small><br>
                            <small>{{ $iteam->c_addr }}</small><br>
                        </td>
                        <td>{{ Str::substr($iteam->p_name, 0, 16) }}</td>
                        <td>{{ $iteam->p_qty }}</td>
                        <td>{{ $footer->default_currency }} {{ number_format($iteam->p_price) }}</td>
                        <td>{{ $footer->default_currency }} {{ number_format($iteam->p_qty * $iteam->p_price) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h6>Grand total =</h6></td>
                        <td>{{ $footer->default_currency }} {{ number_format($total) }}</td>
                    </tr>   
                    @endif
                </tbody>
            </table>
        </div>
        {{ $pending_order->links() }}
    </div>
</div>
@endsection