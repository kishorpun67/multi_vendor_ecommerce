@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Shipping</h4>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Country</th>
                  <th>Rate (0g to 500g)</th>
                  <th>Rate (5001g to 1000g)</th>
                  <th>Rate (1000g to 2000g)</th>
                  <th>Rate (2001g to 5000g)</th>
                  <th>Rate (Above 5000g)</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($shipping_charges as $shipping)
                    <tr>
                        <td>{{$shipping['id']}}</td>
                        <td>{{$shipping['country']}}</td>
                        <td>{{env('PRICE')}}{{$shipping['0_500g']}}</td>
                        <td>{{env('PRICE')}}{{$shipping['501_1000g']}}</td>
                        <td>{{env('PRICE')}}{{$shipping['1001_2000g']}}</td>
                        <td>{{env('PRICE')}}{{$shipping['2001_5000g']}}</td>
                        <td>{{env('PRICE')}}{{$shipping['above_5000g']}}</td>
                        <td>
                        @if($shipping['status']==1)
                            <a  class="updateshippingStatus" id="shipping-{{$shipping['id']}}" shipping_id="{{$shipping['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updateshippingStatus" id="shipping-{{$shipping['id']}}" shipping_id="{{$shipping['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.edit.shipping', $shipping['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection