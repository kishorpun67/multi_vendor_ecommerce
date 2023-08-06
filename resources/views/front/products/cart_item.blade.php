<?php 
    use App\Models\Product;
?>
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPrice = 0  @endphp
            @foreach ($getCartItems as $item)
                <?php  $getDiscountPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']); 
                // dd($getDiscountPrice);
                ?>
                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="{{route('product.detail', $item['product_id'])}}">
                                <img src="{{asset('image/product_image/small/'. $item['product']['product_image'])}}" alt="Product">
                                <h6>{{$item['product']['product_name']}}({{$item['product']['product_code']}}) - {{$item['size']}}
                                    <br> Color: {{$item['product']['product_color']}}
                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        @if ($getDiscountPrice['discount'] > 0)
                            <div class="price-template">
                                <div class="item-new-price">
                                    {{env('PRICE')}}{{$getDiscountPrice['final_price']}}
                                </div>
                                <div class="item-old-price" style="margin-left:-50px;">
                                    {{env('PRICE')}}{{$getDiscountPrice['product_price']}}
                                </div>
                            </div>
                        @else 
                            <div class="price-template">
                                <div class="item-new-price">
                                    {{env('PRICE')}}{{$getDiscountPrice['product_price']}} 
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{$item['quantity']}}">
                                <a class="plus-a updateCrtItem qtyPlus" qty="{{$item['quantity']}}" cart_id =" {{$item['id']}}" data-max="1000">&#43;</a>
                                <a class="minus-a updateCrtItem qtyPlus" qty="{{$item['quantity']}}" cart_id =" {{$item['id']}}" data-min="1">&#45;</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            {{env('PRICE')}} {{$getDiscountPrice['final_price']*$item['quantity']}}
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            {{-- <button class="button button-outline-secondary fas fa-sync"></button> --}}
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{$item['id']}}"></button>
                        </div>
                    </td>
                </tr>
                @php $totalPrice = $totalPrice + $getDiscountPrice['final_price']*$item['quantity'] @endphp
            @endforeach

        </tbody>
    </table>
</div>


<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Cart Totals</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                    </td>
                    <td>
                        <span class="calc-text">{{env('PRICE')}}{{$totalPrice}}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Coupon Discount</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount">
                            @if (Session::has('couponAmount'))
                                {{env('PRICE')}}{{Session::get('couponAmount')}}
                            @else
                                {{env('PRICE')}}0
                            @endif
                        </span>
                    </td>
                </tr>
                @php /*
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>
                        <div class="calc-choice-text u-s-m-b-4">Flat Rate: Not Available</div>
                        <div class="calc-choice-text u-s-m-b-4">Free Shipping: Not Available</div>
                        <a data-toggle="collapse" href="#shipping-calculation" class="calc-anchor u-s-m-b-4">Calculate Shipping
                        </a>
                        <div class="collapse" id="shipping-calculation">
                            <form>
                                <div class="select-country-wrapper u-s-m-b-8">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="select-country">Choose your country
                                        </label>
                                        <select class="select-box" id="select-country">
                                            <option selected="selected" value="">Choose your country...
                                            </option>
                                            <option value="">United Kingdom (UK)</option>
                                            <option value="">United States (US)</option>
                                            <option value="">United Arab Emirates (UAE)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="select-state-wrapper u-s-m-b-8">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="select-state">Choose your state
                                        </label>
                                        <select class="select-box" id="select-state">
                                            <option selected="selected" value="">Choose your state...
                                            </option>
                                            <option value="">Alabama</option>
                                            <option value="">Alaska</option>
                                            <option value="">Arizona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="town-city-div u-s-m-b-8">
                                    <label class="sr-only" for="town-city"></label>
                                    <input type="text" id="town-city" class="text-field" placeholder="Town / City">
                                </div>
                                <div class="postal-code-div u-s-m-b-8">
                                    <label class="sr-only" for="postal-code"></label>
                                    <input type="text" id="postal-code" class="text-field" placeholder="Postcode / Zip">
                                </div>
                                <div class="update-totals-div u-s-m-b-8">
                                    <button class="button button-outline-platinum">Update Totals</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">Tax</h3>
                        <span> (estimated for your country)</span>
                    </td>
                    <td>
                        <span class="calc-text">$0.00</span>
                    </td>
                </tr>
                */ @endphp
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Grand Total</h3>
                    </td>
                    <td>
                        <span class="calc-text grandTotal">{{env('PRICE')}}{{$totalPrice - Session::get('couponAmount')}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
