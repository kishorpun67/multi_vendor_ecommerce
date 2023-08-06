<?php 
 use App\Models\Product;
 use App\Models\Vendor;
 use App\Models\Coupon;

?>
@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">  
            <div class="card-body">
                <h4 class="card-title">Order Details</h4>
                <div class="form-group">
                    <label for="" style="display: block;"><strong>Order ID</strong>: #{{$orderDetails['id']}}</label>
                    <label for="" style="display: block;"><strong>Order Date</strong>: {{date('y-m-d h:i:s', strtotime($orderDetails['created_at']))}}</label>
                    <label for="" style="display: block;"><strong>Order Status</strong>: {{$orderDetails['order_status']}}</label>
                    <label for="" style="display: block;"><strong>Order Total</strong>: {{$orderDetails['grand_total']}}</label>
                    <label for="" style="display: block;"><strong>Shipping Charges</strong>: {{env('PRICE')}}{{$orderDetails['shipping_charges']}}</label>
                    @if (!empty($orderDetails['coupon_code']))
                        <label for="" style="display: block;"><strong>Copon Code</strong>: {{$orderDetails['coupon_code']}}</label>
                    @endif
                    @if (!empty($orderDetails['coupon_amount']))
                        <label for="" style="display: block;"><strong>Coupon Amount</strong>: {{env('PRICE')}}{{$orderDetails['coupon_amount']}}</label>
                    @endif
                    <label for="" style="display: block;"><strong>Total</strong>: {{env('PRICE')}}{{$orderDetails['grand_total']}}</label>
                    <label for="" style="display: block;"><strong>Payment Method</strong>: {{$orderDetails['payment_method']}}</label>
                    <label for="" style="display: block;"><strong>Payment Gateway</strong>: {{$orderDetails['payment_geteway']}}</label>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">  
            <div class="card-body">
                <h4 class="card-title">Customer Details</h4>
                <div class="form-group">
                    <label for="" style="display: block;"><strong>Name</strong>: {{$userDetails['name']}}</label>
                    @if (!empty($userDetails['address']))
                        <label for="" style="display: block;"><strong>Address</strong>: {{$userDetails['address']}}</label>
                    @endif
                    @if (!empty($userDetails['city']))
                        <label for="" style="display: block;"><strong>City</strong>: {{$userDetails['city']}}</label>
                    @endif
                    @if (!empty($userDetails['state']))
                        <label for="" style="display: block;"><strong>State</strong>: {{$userDetails['state']}}</label>
                    @endif
                    @if (!empty($userDetails['country']))
                        <label for="" style="display: block;"><strong>Country</strong>: {{$userDetails['country']}}</label>
                    @endif
                    @if (!empty($userDetails['pincode']))
                        <label for="" style="display: block;"><strong>Pincode</strong>: {{$userDetails['pincode']}}</label>
                    @endif
                    <label for="" style="display: block;"><strong>Mobile</strong>: {{$userDetails['mobile']}}</label>
                    <label for="" style="display: block;"><strong>Email</strong>: {{$userDetails['email']}}</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">  
            <div class="card-body">
                <h4 class="card-title">Delivery Address</h4>
                <div class="form-group">
                    <label for="" style="display: block;"><strong>Name</strong>: {{$deliveryAddress['name']}}</label>
                    @if (!empty($deliveryAddress['address']))
                        <label for="" style="display: block;"><strong>Address</strong>: {{$deliveryAddress['address']}}</label>
                    @endif
                    @if (!empty($deliveryAddress['city']))
                        <label for="" style="display: block;"><strong>City</strong>: {{$deliveryAddress['city']}}</label>
                    @endif
                    @if (!empty($deliveryAddress['state']))
                        <label for="" style="display: block;"><strong>State</strong>: {{$deliveryAddress['state']}}</label>
                    @endif
                    @if (!empty($deliveryAddress['country']))
                        <label for="" style="display: block;"><strong>Country</strong>: {{$deliveryAddress['country']}}</label>
                    @endif
                    @if (!empty($deliveryAddress['pincode']))
                        <label for="" style="display: block;"><strong>Pincode</strong>: {{$deliveryAddress['pincode']}}</label>
                    @endif
                    <label for="" style="display: block;"><strong>Mobile</strong>: {{$deliveryAddress['mobile']}}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">  
            <div class="card-body">
                <h4 class="card-title">Order Status</h4>
                @if (auth('admin')->user()->type != 'vendor')
                    <form action="{{route('admin.update.order.status')}}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$orderDetails['id']}}">
                        <div class="form-group">
                            <select name="order_status" id="order_status" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($orderStatus as $status)
                                    <option value="{{$status['name']}}"
                                    @if (!empty($orderDetails['order_status']) && $orderDetails['order_status'] == $status['name'])
                                        selected="selected"
                                    @endif>{{$status['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="courier_name" name="courier_name" placeholder="Courier Name"
                            @if(!empty($orderDetails['courier_name']))
                            value="{{$orderDetails['courier_name']}}"
                            @else
                            value="{{old('brand')}}"
                            @endif >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tracking_number" name="tracking_number" placeholder="Tracking Number"
                            @if(!empty($orderDetails['tracking_number']))
                            value="{{$orderDetails['tracking_number']}}"
                            @else
                            value="{{old('tracking_number')}}"
                            @endif >
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                    <br>
                    @foreach ($orderLogs as $log)
                        <strong>{{$log['order_status']}}</strong> <br>
                        @if ($log['order_status'] == 'Shipped')
                            @if (isset($log['orders_products']['product_code']))
                                -for item {{$log['orders_products']['product_code']}} <br>
                                @if(!empty($log['orders_products']['courier_name']))
                                    <span>Courier Name: {{$log['orders_products']['courier_name']}} </span> <br>
                                @endif 
                                @if(!empty($log['orders_products']['tracking_number']))
                                    <span>Tracking Number: {{$log['orders_products']['tracking_number']}} </span> <br>
                                @endif
                            @else 
                                @if(!empty($orderDetails['courier_name']))
                                    <span>Courier Name: {{$orderDetails['courier_name']}} </span> <br>
                                @endif 
                                @if(!empty($orderDetails['tracking_number']))
                                    <span>Tracking Number: {{$orderDetails['tracking_number']}} </span> <br>
                                @endif
                            @endif
                        @endif
                        {{date('y-m-d h:i:s', strtotime($log['created_at']))}} <br>
                        <hr>
                    @endforeach
                @else
                This feature is restricted.
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">  
            <div class="card-body">
                <h4 class="card-title">Order Products</h4>
                <div class="table-responsive pt-3">
                    <table id="" class="table table-bordered">
                        <tr>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            @if (auth('admin')->user()->type == 'admin')
                                <th>Product By</th>
                            @endif
                            <th>Commission</th>
                            <th>Final Amount</th>
                            <th>Status</th>
                        </tr>
                        <?php $total_price =0; ?>
                        @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                <?php $productImage= Product::getProuductImage($product['product_id']); ?>
                                <a class="item-img-wrapper-link" href="{{route('product.detail', $product['product_id'])}}">
                                    <img src="{{asset('image/product_image/small/'. $productImage['product_image'])}}" style="width: 50px; height:50px;"  alt="">
                                </a>
                            </td>
                            <td>{{$product['product_code']}}</td>
                            <td>{{$product['product_name']}}</td>
                            <td>{{$product['product_size']}}</td>
                            <td>{{$product['product_color']}}</td>
                            <td>{{env('PRICE')}}{{$product['product_price']}}</td>
                            <td>{{$product['product_qty']}}</td>
                            <td>
                                @if ($product['vendor_id'] > 0)
                                    @if ($orderDetails['coupon_amount'] > 0)
                                        @php $couponDetails = Coupon::couponDetails($orderDetails['coupon_code']) @endphp
                                        @if ($couponDetails['vendor_id'] > 0)
                                        {{env('PRICE')}}{{ $total_price = $product['product_price'] * $product['product_qty'] - $item_discount}} 
                                        @else 
                                            {{env('PRICE')}}{{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                        @endif
                                    @else
                                        {{env('PRICE')}}{{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                    @endif
                                @else 
                                    {{env('PRICE')}}{{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                @endif
                            </td>
                            @if (auth('admin')->user()->type !== 'vendor')
                                <td>
                                    @if ($product['vendor_id'] > 0)
                                        <a target="_blank" href="{{route('admin.view.vendor.details', $product['admin_id'])}}">Vendor</a>
                                    @else 
                                        {{ucfirst(auth('admin')->user()->type)}} 
                                    @endif
                                </td>
                            @endif

                            @if ($product['vendor_id'] > 0)
                                <?php $getVendorCommission = Vendor::getVendorCommission($product['vendor_id']); ?>
                                <td>{{env('PRICE')}}{{$commission = round($total_price*$getVendorCommission/100,2)}} </td>
                                <?php $vendor_paid = $total_price - $commission; ?>
                                <td>{{env('PRICE')}}{{$vendor_paid}} </td>
                            @else
                                <td>{{env('PRICE')}}0</td>
                                <td>{{env('PRICE')}}{{ $total_price}}</td>
                            @endif
                            <td>
                                <form action="{{route('admin.update.order.item.status')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$orderDetails['id']}}">
                                    <input type="hidden" name="item_id" value="{{$product['id']}}">
                                    <select name="item_status" id="item_status" class="item_status" data-id="{{$product['id']}}" required>
                                        <option value="">Select </option>
                                        @foreach ($itemStatus as $status)
                                            <option value="{{$status['name']}}"
                                            @if (!empty($product['item_status']) && $product['item_status'] == $status['name'])
                                                selected="selected"
                                            @endif>{{$status['name']}}</option>
                                        @endforeach
                                    </select>
                                    @php 
                                        if (!empty($product['item_status']) && $product['item_status'] =='Shipped') {
                                            $display = 'inline';
                                        }else {
                                            $display = 'none';
                                        }
                                    @endphp
                                    <input type="text" style="display: {{$display}}; width:100px;" class="" id="item_courier_name-{{$product['id']}}" name="item_courier_name" placeholder="Item Courier Name"
                                    @if(!empty($product['courier_name']))
                                        value="{{$product['courier_name']}}"
                                        @else
                                        value="{{old('item_courier_name')}}"
                                    @endif> 
                                    <input type="text" style="display: {{$display}}; width:100px;" class="" id="item_tracking_number-{{$product['id']}}" name="item_tracking_number" placeholder="Item Tracking Number"
                                    @if(!empty($product['tracking_number']))
                                        value="{{$product['tracking_number']}}"
                                        @else
                                        value="{{old('item_tracking_number')}}"
                                    @endif>
                                    <button type="submit" class="">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection