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
                    <a href="javascript:void(0);">Orders</a>
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
                    <th>Order ID</th>
                    <th>Ordered Produts</th>
                    <th>Payment Method</th>
                    <th>Grand Total</th>
                    <th>Created On</th>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{route('orders', $order['id'])}}">{{$order['id']}}</a></td>
                        <td>
                            @foreach ($order['orders_products'] as $product)
                                {{$product['product_code']}} <br>
                            @endforeach
                        </td>
                        <td>{{$order['payment_method']}}</td>
                        <td>{{$order['grand_total']}}</td>
                        <td>{{$order['created_at']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection