@extends('admin.layout.admin_layout')
@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Orders</h4>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order Date</th>
                  <th>Order Status</th>
                  <th>Payment Method</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                    @if ($order['orders_products'])
                        <tr>
                            <td>{{$order['id']}}</td>
                            <td>{{$order['name']}}</td>
                            <td>{{$order['email']}}</td>
                            <td>
                                @foreach ($order['orders_products'] as $product)
                                    {{$product['product_code']}} 
                                    ({{$product['product_qty']}})
                                    <br>
                                @endforeach
                            </td>
                            <td>{{env('PRICE')}}{{$order['grand_total']}}</td>
                            <td>{{date('y-m-d h:i:s', strtotime($order['created_at']))}}</td>
                            <td>{{$order['order_status']}}</td>
                            <td>{{$order['payment_method']}}</td>
                            <td>
                              <a href="{{route('admin.order.details', $order['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-file-document"></i></a>
                              <a target="_blank" href="{{route('admin.order.invoice', $order['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-printer"></i></a>
                              <a target="_blank" href="{{route('admin.order.invoice.pdf', $order['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-file-pdf"></i></a>

                            </td>
                        </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection