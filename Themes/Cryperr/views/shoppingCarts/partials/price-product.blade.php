<div class="price-block">
    {{-- <span class="price">{{ number_format($discount_price) }} VND</span>  --}}
    @if (isset($price_member) && isset($price_sale) && $price_member > $price_sale && $is_promotion == 1)
    <div class="d-flex justify-content-left">
        <span class="price">{{ number_format($price_sale) }} VND</span> <span class="price" style="padding-left: 3px; font-weight:300;text-decoration: line-through; color: gray;">{{ number_format($price_member) }} VND</span>
    </div>
    @elseif(isset($price_member) && $price_member > 0)
    <span class="price">{{ number_format($price_member) }} VND</span>
    @elseif(isset($price_sale) && $price_sale > 0)
    <div class="d-flex justify-content-left">
        <span class="price">{{ number_format($price_sale) }} VND</span> <span class="price" style="padding-left: 3px; font-weight:300;text-decoration: line-through; color: gray;">{{ number_format($price) }} VND</span>
    </div>
    @else
    <span class="price">{{ number_format($price) }} VND</span>
    @endif
</div>