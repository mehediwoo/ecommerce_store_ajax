
<ul class="minicart-product-list" id="cart_iteam_list">
    @php
        $total = 0;
    @endphp
    @if (session()->has('cart'))
    @foreach (session()->get('cart') as $key=>$row)
    <li>
        <a href="single-product.html" class="minicart-product-image">
            <img src="{{ asset('storage/'.$row['image'] ) }}" alt="cart products">
        </a>
        <div class="minicart-product-details">
            <h6><a href="single-product.html">{{ substr($row['name'],0,20) }}</a></h6>
            <span>
                {{ $footer->default_currency }} {{ number_format($row['price'],0,'',',') }} x {{ $row['qty'] }} = {{ $footer->default_currency }} {{ number_format($row['price']*$row['qty'],0,'',',') }}
            </span>
        </div>
        <button id="remove_cart_iteam" iteam_id="{{$key}}" class="close">
            <i class="fa fa-close"></i>
        </button>
    </li>
        @php
            $total = $total+$row['price']*$row['qty'];
        @endphp
    @endforeach
    @endif

</ul>

<p class="minicart-total">SUBTOTAL: <span>{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}</span></p>
<p id="totals" total_ammount="{{ $footer->default_currency }} {{ number_format($total,0,'',',') }}"></p>
<div class="minicart-button">
    <a href="{{ route('view.cart') }}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
        <span>View Full Cart</span>
    </a>
    <a href="{{ route('checkout') }}" class="li-button li-button-fullwidth li-button-sm">
        <span>Checkout</span>
    </a>
</div>
<script>
    // topbar cart total ammount
    function cart_ammount(){
        let total = $('#totals').attr('total_ammount');
            $('#total_ammount').html(total);
        }
        cart_ammount();
</script>
