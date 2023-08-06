@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Attribute</h4>
        
         <p>Product Name :&nbsp;{{$productDetails['product_name']}}</p> 
         <p>Product Code :&nbsp;{{$productDetails['product_code']}}</p> 
         <p>Product Color :&nbsp;{{$productDetails['product_color']}}</p> 
         <p>Product Price :&nbsp;{{$productDetails['product_price']}}</p> 
         <img src="{{asset('image/product_image/small/'.$productDetails['product_image'])}}" width="150px" height="150px" alt="">

         <div style="height:10px;"></div>
        <form class="forms-sample" method="POST" @if(!empty($productDetails['id'])) 
            action="{{route('admin.add.image',$productDetails['id'])}}" 
            @else action="{{route('admin.add.image')}}" @endif enctype="multipart/form-data">
            @csrf
            <div class="field_wrapper">
                <div>
                    <input type="file" multiple class="form-control" name="image[]" value="" placeholder="SKU" required/>
                    <br>
                </div>
            </div>
            <br>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div> 
  </div>
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Image</h4>
        <div class="table-responsive pt-3">
          <table id="section" class="table table-bordered">
            <thead>
              <tr>
                <th> ID</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productDetails['images'] as $image)
                  <tr>
                      <td>{{$image['id']}}</td>
                      <td><img src="{{asset('image/product_image/small/'. $image['image'])}}" style="border-r
                      :0px" alt=""></td>
                  
                      <td>
                        @if($image['status']==1)
                            <a  class="updateProuductImageStatus" id="image-{{$image['id']}}" image_id="{{$image['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updateProuductImageStatus" id="image-{{$image['id']}}" image_id="{{$image['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                          <a href="javascript:vode(0);" rel="{{$image['id']}}" record={{'image'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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