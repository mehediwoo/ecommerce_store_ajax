@if (!empty($order) && $order->count() > 0)
    @foreach ($order as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >
            <b>Name</b>: {{ $row->customer->name }} <br>
            <b>Email</b>: {{ $row->customer->email }} <br>
            <b>Phone</b>: {{ $row->billing_info->phone }} <br>
            <b>City</b>: {{ $row->billing_info->city }} <br>
            <b>Country</b>: {{ $row->billing_info->country }} <br>
            <b>Address</b>: {{ $row->billing_info->address }} <br>
            
        </td>
        <td ><img src="{{ asset('storage/'.$row->p_image) }}" style="width: 5rem; height: 5rem;"></td>
        <td>{{ $row->p_name }} </td>
        <td width="20%">{{ $row->p_qty.' x '. $row->p_price .'='. $footer->default_currency.' '.number_format($row->p_qty*$row->p_price)}} </td>

        <td width="20%">
            @if ($row->status != '' && $row->status=='processing')
            <span class="status-completed" data="{{ $row->id }}" id="orderStatus" style="cursor: pointer">Click to complete</span>
            @endif
        </td>
    </tr>
    @endforeach
@endif
