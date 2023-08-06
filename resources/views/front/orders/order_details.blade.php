<?php 
 use App\Models\Product;
?>
@extends('front.layout.layout')
@section('content')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Orders</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="{{route('orders')}}">Orders</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">   
            <table class="table table-striped table-borderless">
                <tr>
                    <td colspan="2"> <strong>Order Details</strong> </td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td>{{date('y-m-d h:i:s', strtotime($orderDetails['created_at']))}}</td>
                </tr>
                <tr>
                    <td>Order Status</td>
                    <td>{{$orderDetails['order_status']}}</td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>{{env('PRICE')}}{{$orderDetails['grand_total']}}</td>
                </tr>
                <tr>
                    <td>Shipping Charges</td>
                    <td>{{env('PRICE')}}{{$orderDetails['shipping_charges']}}</td>
                </tr>
                @if (!empty($orderDetails['coupon_code']))
                    <tr>
                        <td>Coupon Code</td>
                        <td>{{$orderDetails['coupon_code']}}</td>
                    </tr>
                    <tr>
                        <td>Coupon Amount</td>
                        <td>{{env('PRICE')}}{{$orderDetails['coupon_amount']}}</td>
                    </tr>
                @endif
                @if (!empty($orderDetails['courier_name']))
                    <tr>
                        <td>Courier Name</td>
                        <td>{{$orderDetails['courier_name']}}</td>
                    </tr>
                    <tr>
                        <td>Tracking Number</td>
                        <td>{{$orderDetails['tracking_number']}}</td>
                    </tr>
                @endif
                <tr>
                    <td>Payment Method</td>
                    <td>{{$orderDetails['payment_method']}}</td>
                </tr>
            </table>
            <table class="table table-striped table-borderless">

                <tr><td colspan="6"><strong>Product Details</strong></td></tr>
                <tr>
                    <th>Product Image</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Product Color</th>
                    <th>Product Qty</th>
                </tr>
                @foreach ($orderDetails['orders_products'] as $product)
                <tr>
                    <td>
                        <?php $productImage= Product::getProuductImage($product['product_id']); ?>
                        <a class="item-img-wrapper-link" href="{{route('product.detail', $product['product_id'])}}">
                            <img src="{{asset('image/product_image/small/'. $productImage['product_image'])}}" style="width: 80px;" alt="">
                        </a>
                    </td>
                    <td>{{$product['product_code']}}</td>
                    <td>{{$product['product_name']}}</td>
                    <td>{{$product['product_size']}}</td>
                    <td>{{$product['product_color']}}</td>
                    <td>{{$product['product_qty']}}</td>
                </tr>
                @if (!empty($product['courier_name']))
                    <tr><td colspan="6">Courier Name: {{$product['courier_name']}}, Tracking Number: {{$product['tracking_number']}}</td></tr>
                @endif
                @endforeach
            </table>
            <table class="table table-striped table-borderless">
                <tr>
                    <td colspan="2"> <strong>Delivery Address</strong> </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$orderDetails['name']}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$orderDetails['address']}}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{$orderDetails['city']}}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{$orderDetails['country']}}</td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td>{{$orderDetails['pincode']}}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{$orderDetails['mobile']}}</td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td>{{$orderDetails['payment_method']}}</td>
                </tr>
              
            </table>
            
        </div>
    </div>
</div>
@endsection