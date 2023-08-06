@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Ratings</h4>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Product Name</th>
                  <th>User Email</th>
                  <th>Message</th>
                  <th>Rating</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ratings as $rating)
                    <tr>
                        <td>{{$rating['id']}}</td>
                        <td>
                          <a target="_blank" href="{{route('product.detail', $rating['product']['id'])}}">{{$rating['product']['product_name']}} </a>
                        </td>
                        <td>{{$rating['user']['name']}}</td>
                        <td>{{$rating['review']}}</td>
                        <td>{{$rating['rating']}}</td>
                        <td>
                          @if($rating['status']==1)
                              <a  class="updateratingStatus" id="rating-{{$rating['id']}}" rating_id="{{$rating['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                          @else
                              <a class="updateratingStatus" id="rating-{{$rating['id']}}" rating_id="{{$rating['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                          @endif
                            <a href="javascript:vode(0);" rel="{{$rating['id']}}" record={{'rating'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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