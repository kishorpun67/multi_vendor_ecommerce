
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Cart</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="javascript:void(0);">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <Strong>Error: {{Session::get('error_message')}}</Strong>
                        <button type="button" class="close" data-dismiss='alert' aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="appendCartItems">
                    @include('front.products.cart_item')
                </div>
                <div class="coupon-continue-checkout u-s-m-b-60">
                    <div class="coupon-area">
                        <h6>Enter your coupon code if you have one.</h6>
                        <div class="coupon-field">
                            <form id="ApplyForm" method="post" action="javascript:void(0);" @if (auth()->check()) user =1 @endif>
                                @csrf
                                <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                <input id="coupon-code" name='coupon_code' type="text" class="text-field" placeholder="Coupon Code">
                                <button type="submit" class="button">Apply Coupon</button>
                            </form>
                        </div>
                    </div>
                    <div class="button-area">
                        <a href="" class="continue">Continue Shopping</a>
                        <a href="{{route('checkout')}}" class="checkout">Proceed to Checkout</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection