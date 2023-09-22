@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">{{$title}}</h4>
      <form class="forms-sample" method="POST" @if(!empty($productdata['id'])) 
        action="{{route('admin.add.edit.product',$productdata['id'])}}" 
        @else action="{{route('admin.add.edit.product')}}" @endif  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Select Category *</label>
            <select name="category_id" id="cateogory_id"  class="form-control select2" style="width: 100%;">
              <option value="">Select</option>
              @forelse($categories as $section)
                <optgroup label ={{$section['name']}}></optgroup>
                @foreach($section['categories'] as $category)
                  <option value="{{$category['id']}}"
                      @if(!empty(@old('category_id')) && $category->id==@old('category_id'))
                      selected=""
                      @elseif(!empty($productdata['category_id']) && $productdata['category_id']==$category['id'])
                      selected=""
                      @endif
                      >&nbsp;--&nbsp; {{$category['category_name']}}</option>
                  @foreach($category['subcategories'] as $subCategory)
                      <option value="{{$subCategory['id']}}"
                      @if(!empty(@old('category_id')) && $subCategory->id==@old('category_id'))
                      selected=""
                      @elseif(!empty($productdata['category_id']) && $productdata['category_id']==$subCategory['id'])
                      selected=""
                      @endif
                      >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; {{$subCategory['category_name']}}</option>
                  @endforeach
                @endforeach
              @empty
              @endforelse
            </select>
          @error('category_id')
          <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="loadFilters" id="loadFilters">
          @include('admin.filters.category_filters')
        </div>
        <div class="form-group">
          <label>Select Brand *</label>
          <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                  <option Value="">Select</option>
                  @forelse($brands as $brand)
                      <option value="{{$brand['id']}}" @if(!empty($productdata['brand_id']) && $productdata['brand_id']==$brand['id']) selected="" @endif>
                      {{$brand['brands']}}</option>
                  @empty
                  @endforelse
          </select>
          @error('brand_id')
          <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="product">Product Name *</label>
          <input type="text" class="form-control" id="" placeholder="Enter Product Name" name="product_name"
          value="{{$productdata['product_name'] ?? old('product_name') }}">
          @error('product_name')
            <p  style="color: red">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
            <label for="category_discoutn">Product Price *</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price Rs."
            @if(!empty($productdata['product_price']))
            value= "{{$productdata['product_price']}}"
            @else value="{{old('product_price')}}"
            @endif>
            @error('product_price')
            <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Prouduct Color *</label>
          <input type="text" name="product_color" id="product_color" class="form-control"  placeholder="Enter Product Color"
          value= "{{$productdata['product_color'] ?? old('product_color')}}">
          @error('product_color')
            <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="category_discoutn">Product Code *</label>
            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Code"
            value= "{{$productdata['product_code'] ?? old('product_code')}}">
            @error('product_code')
            <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="group_code">Group Code </label>
          <input type="text" class="form-control" id="group_code" name="group_code" placeholder="Group Code"
          value= "{{$productdata['group_code'] ?? old('group_code')}}">
          @error('group_code')
          <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="product_image">Product Image *</label>
          <input type="file" class="form-control" name="product_image" id="image" >
          @if (!empty($productdata['product_image']))
              <br>
              <img src="{{asset('image/product_image/small/'.$productdata['product_image'])}}" alt="" height="200" width="200"/>
          @endif
          @error('product_image')
            <p  style="color: red">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
            <label for="product_url"> Product Url *</label>
            <input type="text" class="form-control" id="" placeholder="Enter Discount" name="product_url"
            value="{{$productdata['product_url'] ?? old('product_url')}}">
            @error('product_url')
                <p  style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prouduct Discount (%)</label>
            <input type="text" name="product_discount" id="productd_discount" class="form-control"  placeholder="Enter Product Discount"
            value= "{{$productdata['product_discount'] ?? old('product_discount')}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prouduct Weight (g)</label>
            <input type="text" name="product_weight" id="product_weight" class="form-control"  placeholder="Enter Product Weight"
            value= "{{$productdata['product_weight'] ?? old('product_weight')}}">
        </div>
        <div class="form-group">
          <label> Description</label>
          <textarea class="form-control"  name="description" rows="5" id="description" placeholder="Enter ...">
            {{$productdata['description'] ?? old('description')}}
          </textarea>
        </div>
        <div class="form-group">
          <label>Meta Keywords</label>
          <textarea class="form-control"  name="meta_keywords" rows="5" id="Meta Keywords" placeholder="Enter ...">
          {{$productdata['meta_keywords'] ?? old('meta_keywords')}}
          </textarea>
        </div>
        <div class="form-group">
          <label> Meta Title</label>
          <textarea class="form-control"  name="meta_title" rows="5" id="Meta Title" placeholder="Enter ...">
              {{$productdata['meta_title'] ?? old('meta_title')}}
          </textarea>
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <textarea class="form-control"  name="meta_description" rows="5" id="Meta Description" placeholder="Enter ...">
              {{$productdata['meta_description'] ?? old('meta_description')}}
          </textarea>
        </div>
        <div class="form-group">
          <label for="is_featured">Featured Item</label>
          <input type="checkbox" name="is_featured" id="is_featured" value="Yes"
          @if (!empty($productdata['is_featured']) && $productdata['is_featured'] == "Yes")
            checked="" 
          @endif>
        </div>
        <div class="form-group">
          <label for="is_best_seller">Best Seller Item</label>
          <input type="checkbox" name="is_best_seller" id="is_best_seller"  value="Yes"
          @if (!empty($productdata['is_best_seller']) && $productdata['is_best_seller'] == "Yes")
            checked="" 
          @endif>
        </div>
        <button type="submit" class="btn btn-primary mr-2">{{$button}}</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection