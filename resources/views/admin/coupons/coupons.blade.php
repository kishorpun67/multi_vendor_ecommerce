@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Coupons</h4>
          <a href="{{route('admin.add.edit.coupon')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add Coupon</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Coupon Code</th>
                  <th>Coupon Type</th>
                  <th>Amount</th>
                  <th>Expiry Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{$coupon['id']}}</td>
                        <td>{{$coupon['coupon_code']}}</td>
                        <td>{{$coupon['coupon_type']}}</td>
                        <td>{{$coupon['amount']}}
                            @if ($coupon['amount_type'] == 'Percentage')
                                %
                            @else
                               {{env('PRICE')}} 
                            @endif
                        </td>
                        <td>{{$coupon['expiry_date']}}</td>
                        <td>
                        @if($coupon['status']==1)
                            <a  class="updatecouponStatus" id="coupon-{{$coupon['id']}}" coupon_id="{{$coupon['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updatecouponStatus" id="coupon-{{$coupon['id']}}" coupon_id="{{$coupon['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.coupon', $coupon['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$coupon['id']}}" record={{'coupon'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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