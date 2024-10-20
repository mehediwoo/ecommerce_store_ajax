@if (!empty($payment) && $payment->count() > 0)
@foreach ($payment as $key=>$row)
<tr>
    <td class="py-3">{{ $key+1 }}</td>
    <td class="py-3">{{ $row->payment_name }}</td>
    <td class="py-3">{{ $row->store_id }}</td>
    <td class="py-3">{{ $row->signature_key }}</td>
    <td class="py-3">{{ $row->updated_at->format('d-M-Y') }}</td>
    <td class="py-3">
        @if ($row->status=='1')
        <span class="status-completed" style="cursor: pointer" id="status" payment_id="{{ $row->id }}">Enable</span>
        @else
        <span class="status-cancelled" style="cursor: pointer" id="status" payment_id="{{ $row->id }}">Disable</span>
        @endif

    </td>
    <td class="py-3">
        <a href="" data='{{ $row->id }}' pay_name="{{ $row->payment_name }}" store_id="{{ $row->store_id }}" sig_key="{{ $row->signature_key }}" id="editPayment" class="d-inline-block">
            <span class="p-2 brand-color me-3">
                <i class="fa-regular fa-pen-to-square"></i>
            </span>
        </a>
        <a href="" class="d-inline-block" id="delete" payment_id="{{ $row->id }}">
            <span class="p-2 red-color">
                <i class="fa-regular fa-trash-can"></i>
            </span>
        </a>
    </td>
</tr>
@endforeach
@endif

