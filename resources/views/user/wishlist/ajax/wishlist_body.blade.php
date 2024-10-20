@if (!empty($wishlist) && $wishlist->count() > 0)
@foreach($wishlist as $row)
<tr>
    <td class="li-product-remove">
        <a id="remove_wishlist" w_id="{{ $row->id }}" href=""><i class="fa fa-times"></i></a>
    </td>
    <td class="li-product-thumbnail">
        <a href="{{ route('view.product',$row->product->p_slug) }}">
            <img src="{{ asset('storage/'.$row->product->thumbnail) }}" style="height: 100px; width:100px">
        </a>
    </td>
    <td class="li-product-name">
        <a href="{{ route('view.product',$row->product->p_slug) }}">{{ $row->product->p_title }}</a>
    </td>
    <td class="li-product-price">
        <span class="amount">{{ $footer->default_currency }} {{ number_format($row->product->p_discount_price) }}</span>
    </td>
    <td class="li-product-stock-status">
        @if($row->product->p_qty < 10)
        <span class="in-stock">out of stock</span>
        @else
        <span class="in-stock">in stock</span>
        @endif
    </td>
</tr>
@endforeach  
@else
    
@endif