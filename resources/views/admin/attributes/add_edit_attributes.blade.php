@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Attribute</h4>
        
         <p>Product Name :&nbsp;{{$attributes['product_name']}}</p> 
         <p>Product Code :&nbsp;{{$attributes['product_code']}}</p> 
         <p>Product Color :&nbsp;{{$attributes['product_color']}}</p> 
         <p>Product Price :&nbsp;{{$attributes['product_price']}}</p> 
         <img src="{{asset('image/product_image/small/'.$attributes['product_image'])}}" width="150px" height="150px" alt="">

         <div style="height:10px;"></div>
        <form class="forms-sample" method="POST" @if(!empty($attributes['id'])) 
            action="{{route('admin.add.attributes',$attributes['id'])}}" 
            @else action="{{route('admin.add.attributes')}}" @endif>
            @csrf
            <div class="field_wrapper">
                <div>
                    <input type="text" style="width: 100px; " name="sku[]" value="" placeholder="SKU" required/>
                    <input type="text" style="width: 100px; " name="size[]" value="" placeholder="Size" required/>
                    <input type="text" style="width: 100px; "  name="price[]" value="" placeholder="Price" required/>
                    <input type="text" style="width: 100px; " name="stock[]" value="" placeholder="Stock" required/>  
                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
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
        <h4 class="card-title">Stock</h4>
        <div class="table-responsive pt-3">
          <form class="forms-sample" method="POST" @if(!empty($attributes['id'])) 
            action="{{route('admin.edit.attributes',$attributes['id'])}}"@endif>
            @csrf
              <table id="section" class="table table-bordered">
                <thead>
                  <tr>
                    <th> ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($attributes['attributes'] as $attribute)
                      <tr>
                          <input type="hidden" name="attrId[]" value="{{$attribute['id']}}">
                          <td>{{$attribute['id']}}</td>
                          <td>{{$attribute['sku']}}</td>
                          <td>{{$attribute['size']}}</td>
                          <td><input type="number" style="width:80px;" name="price[]" id=""  value="{{$attribute['price']}}"></td>
                          <td><input type="number" style="width:80px;" name="stock[]" id=""  value="{{$attribute['stock']}}"></td>
                          <td>
                          @if($attribute['status']==1)
                            <a  class="updateattributeStatus" id="attribute-{{$attribute['id']}}" attribute_id="{{$attribute['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                          @else
                            <a class="updateattributeStatus" id="attribute-{{$attribute['id']}}" attribute_id="{{$attribute['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                          @endif
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            <button type="submit" class="btn btn-primary mr-2 mb-3">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection