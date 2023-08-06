<?php 
 use App\Models\Product;
?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Checkout</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="javascript:">Checkout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Checkout-Page -->
<div class="page-checkout u-s-p-t-80">
    <div class="container">
        @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <Strong>Error: {{Session::get('error_message')}}</Strong>
                <button type="button" class="close" data-dismiss='alert' aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-6" id="deliveryAddress">
                        @include('front.products.delivery_addresses')
                    </div>
                    <div class="col-lg-6">
                        <form action="{{route('checkout')}}" method="post">
                                <h4 class="section-h4">Delivery Address </h4>
                            @csrf
                            @foreach ($deliveryAddress as $address)
                                {{-- <div class="control-group" style="float:left; margin-right:5px;"> --}}
                                    <input type="radio" id='{{$address['id']}}' shipping_charges="{{$address['shippng_charges']}}" 
                                    total_price="{{$total_price}}" coupon_amount="{{Session::get('couponAmount')}}" name="address_id"  
                                    class="addressId" value="{{$address['id']}}" codpincodeCount="{{$address['codpincodeCount']}}">
                                    <label  for="" class="control-label">{{$address['name']}}, {{$address['address']}}, {{$address['city']}}
                                    , {{$address['state']}}, {{$address['country']}}, {{$address['mobile']}}</label> 
                                    <a style="float: right; margin-left:5px;" href="javascript:" data-addressid="{{$address['id']}}" class="removeAddress">Remove</a>
                                    <a style="float: right; " href="javascript:" data-addressid="{{$address['id']}}" class="editAddress">Edit</a>  
                                    <br>
                                {{-- </div>  --}}
                            @endforeach
                            <br>
                            <h4 class="section-h4">Your Order </h4>
                            <div class="order-table">
                                <table class="u-s-m-b-13">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalPrice = 0  @endphp
                                        @foreach ($getCartItems as $item)
                                        <?php  $getDiscountPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);  ?>
                                        <tr>
                                            <td><a href="{{route('product.detail', $item['product_id'])}}">
                                                <img width='50px' height="50px" src="{{asset('image/product_image/small/'. $item['product']['product_image'])}}" alt="Product">
                                                
                                                <h6 class="order-h6">{{$item['product']['product_name']}}</h6>
                                                <span class="order-span-quantity">x {{$item['quantity']}}</span>
                                            </td>
                                            @if ($getDiscountPrice['discount'] > 0)
                                                <td>
                                                    <h6 class="order-h6">{{env('PRICE')}}{{$getDiscountPrice['final_price']}}</h6>
                                                </td>
                                            @else 
                                                <td>
                                                    <h6 class="order-h6">{{env('PRICE')}}{{$getDiscountPrice['product_price']}}</h6>
                                                </td>
                                            @endif
                                        </a>
                                        </tr>
                                        @php $totalPrice = $totalPrice + $getDiscountPrice['final_price']*$item['quantity'] @endphp
                                        @endforeach
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Subtotal</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">
                                                    {{env('PRICE')}} {{$totalPrice}}
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h6 ">Shipping Charges</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h6 shippingCharge">
                                                    {{env('PRICE')}}0
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h6">Discount</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h6 couponAmount">
                                                    @if (Session::has('couponAmount'))
                                                        {{env('PRICE')}}{{Session::get('couponAmount')}}
                                                    @else
                                                        {{env('PRICE')}}0
                                                    @endif
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Total</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3 grandTotal">{{env('PRICE')}}{{$totalPrice - Session::get('couponAmount')}}</h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="u-s-m-b-13 codMethod">
                                    <input type="radio" class="radio-box" name="payment-method" id="cash-on-delivery" value="COD">
                                    <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                </div>
                                <div class="u-s-m-b-13">
                                    <input type="radio" class="radio-box" name="payment-method" id="credit-card-stripe">
                                    <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                </div>
                                <div class="u-s-m-b-13">
                                    <input type="radio" class="radio-box" name="payment-method" id="paypal">
                                    <label class="label-text" for="paypal">Paypal</label>
                                </div>
                                <div class="u-s-m-b-13">
                                    <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes">
                                    <label class="label-text no-color" for="accept">I’ve read and accept the
                                        <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                    </label>
                                </div>
                                <button type="submit" id="orderPlace" class="button button-outline-secondary">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection