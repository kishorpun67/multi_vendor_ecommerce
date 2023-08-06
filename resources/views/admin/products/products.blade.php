@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Products</h4>
          <a href="{{route('admin.add.edit.product')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add product</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Section</th>
                  <th>Added by</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['product_name']}}</td>
                        <td>{{$product['product_code']}}</td>
                        <td>{{$product['product_color']}}</td>
                        <td>@if(!empty($product['product_image']))
                          <img src="{{asset('image/product_image/small/'.$product['product_image'])}}" alt="" width="100px" height="100px"></td>
                          @else 
                          @endif
                        </td>
                        <td>
                          @if (!empty($product['category']['category_name']))
                            {{$product['category']['category_name']}} 
                          @else
                            No Category
                          @endif
                        </td>
                        <td> 
                          @if (!empty($product['section']['name']))
                            {{$product['section']['name']}}
                          @else
                            No Section
                          @endif
                        </td>
                        <td>
                          @if ($product['admin_type'] == 'vendor')
                              <a href="{{route('admin.view.vendor.details', $product['admin_id'])}}">{{ucfirst($product['admin_type'])}}</a>
                          @else
                              {{ucfirst($product['admin_type'])}} 
                          @endif
                        </td>
                        <td>
                          @if($product['status']==1)
                              <a  class="updateproductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                          @else
                              <a class="updateproductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                          @endif
                        </td>
                        <td>
                          <a href="{{route('admin.add.edit.product', $product['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                          <a href="{{route('admin.add.attributes', $product['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-plus-box"></i></a>
                          <a href="{{route('admin.add.image', $product['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-plus-box"></i></a>
                          <a href="javascript:vode(0);" rel="{{$product['id']}}" record={{'product'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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