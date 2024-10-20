@extends('user.profile.layout')
@section('profileContent')
<h3>Dashboard</h3>

<div class="row">
    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-warning">Pending Order</p>
            @if (!empty($pending_order))
            <h1 class="text-center text-warning">{{ $pending_order->count() }}</h1>
            @else
            <h1 class="text-center text-warning">0</h1>
            @endif

        </div>
    </div>

    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-success">Confirm Order</p>
            @if (!empty($confirm_order))
            <h1 class="text-center text-warning">{{ $confirm_order->count() }}</h1>
            @else
            <h1 class="text-center text-warning">0</h1>
            @endif
        </div>
    </div>


    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-danger">Pending Amount</p>
            @if (!empty($pending_ammount))
            @php
            $total =0; 
            foreach ($pending_ammount as $key => $row) {
                $total = $total + $row->p_qty * $row->p_price;
            }  
            @endphp
            
            <h1 class="text-center text-danger">{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</h1>
            @else
            <h1 class="text-center text-danger">0</h1>
            @endif
        </div>
    </div>

    <div class="col-3">
        <div class="box_main">
            <p class="text-center text-info">Confirm Amount</p>
            @if (!empty($confirm_ammount))
            @php
            $total =0; 
            foreach ($confirm_ammount as $key => $row) {
                $total = $total + $row->p_qty * $row->p_price;
            }  
            @endphp
            <h1 class="text-center text-info">{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</h1>
            @else
            <h1 class="text-center text-info">0</h1>
            @endif
        </div>
    </div>
</div>
@endsection