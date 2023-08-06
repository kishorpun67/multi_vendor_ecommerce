<?php 
    use App\Models\Product;
    use App\Models\Cart;

    $getCartItems = Cart::getCartItems();

?>
<ul class="mini-cart-list">
    @php $totalPrice = 0  @endphp
    @foreach ($getCartItems as $item)
        <?php  $getDiscountPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);  ?>
        <li class="clearfix">
            <a href="{{route('product.detail', $item['product_id'])}}">
                <img src="{{asset('image/product_image/small/'. $item['product']['product_image'])}}" alt="Product">
                <span class="mini-item-name">{{$item['product']['product_name']}}</span>
                @if ($getDiscountPrice['discount'] > 0)
                    <span class="mini-item-price">{{env('PRICE')}}{{$getDiscountPrice['final_price']}} </span>
                @else 
                    <span class="mini-item-price">{{env('PRICE')}}{{$getDiscountPrice['product_price']}} </span>
                @endif
                <span class="mini-item-quantity"> x {{$item['quantity']}}</span>
            </a>
        </li>
        @php $totalPrice = $totalPrice + $getDiscountPrice['final_price']*$item['quantity'] @endphp
    @endforeach
</ul>
<div class="mini-shop-total clearfix">
    <span class="mini-total-heading float-left">Total:</span>
    <span class="mini-total-price float-right">{{env('PRICE')}}{{$totalPrice}}</span>
</div>
