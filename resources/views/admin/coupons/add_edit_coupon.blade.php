@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($coupondata['id'])) 
        action="{{route('admin.add.edit.coupon',$coupondata['id'])}}" 
        @else action="{{route('admin.add.edit.coupon')}}" @endif>
          @csrf
          <div class="form-group">
            <label for="">Coupon Option</label> <br>
            <span><input type="radio" class="coupon_option" name="coupon_option" value="Automatic" 
                @if (empty($coupondata['coupon_option']) || $coupondata['coupon_option']=="Automatic")
                    checked="checked"
                @endif
                 id="AutomaticCoupon"> &nbsp; Automatic&nbsp;&nbsp;</span>
            <span><input type="radio" class="coupon_option" name="coupon_option"
                @if (!empty($coupondata['coupon_option']) && $coupondata['coupon_option']=="Manual")
                    checked="checked"
                @endif
                 value="Manual"  id="ManulCoupon"> &nbsp; Manual</span>
            @error('coupon_option')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          @if(!empty($coupondata['coupon_code']))
            @php  $display= "block" @endphp
          @else
            @php  $display= "none" @endphp

          @endif 
          <div class="form-group"  style="display: {{$display}};" id="couponField">
            <label for="">Coupon Code</label>
            <input type="text" class="form-control" name="coupon_code" id="" placeholder="Coupon Code" name="coupon_code"
            @if(!empty($coupondata['coupon_code']))
            value="{{$coupondata['coupon_code']}}"
            @else
            value="{{old('coupon_code')}}"
            @endif >
            @error('coupon_code')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Coupon Type</label> <br>
            <span><input type="radio" class="coupon_type" name="coupon_type" value="Multiple Times" checked id="Multiple Times"
                @if (empty($coupondata['coupon_type']) || $coupondata['coupon_type']=="Multiple Times")
                    checked="checked"
                @endif
                > &nbsp; Multiple Times&nbsp;&nbsp;</span>
            <span><input type="radio" class="coupon_type" name="coupon_type" value="Single Time"  id="Sigle Time"
                @if (!empty($coupondata['coupon_type']) && $coupondata['coupon_type']=="Single Time")
                    checked="checked"
                @endif> &nbsp; Single Time</span>
            @error('coupon_type')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Amount Type</label> <br>
            <span><input type="radio" class="amount_type" name="amount_type" value="Percentage" checked id="Percentage"
                @if (empty($coupondata['amount_type']) || $coupondata['amount_type']=="Percentage")
                    checked="checked"
                @endif
                > &nbsp; Percentage&nbsp;(in %)&nbsp;</span>
            <span><input type="radio" class="amount_type" name="amount_type" value="Fixed"  id="Fixed"
                @if (!empty($coupondata['amount_type']) && $coupondata['amount_type']=="Fixed")
                    checked="checked"
                @endif> &nbsp; Fixed &nbsp;(in {{env('PRICE')}})</span>
            @error('amount_type')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Amount</label>
            <input type="text" class="form-control" name="amount" id="" placeholder="Amount" name="amount"
            @if(!empty($coupondata['amount']))
            value="{{$coupondata['amount']}}"
            @else
            value="{{old('amount')}}"
            @endif >
            @error('amount')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Select Category</label>
              <select name="categories[]" id="cateogory_id"  class="form-control" multiple="">
                @forelse($categories as $section)
                  <optgroup label ={{$section['name']}}></optgroup>
                  @foreach($section['categories'] as $category)
                    <option value="{{$category['id']}}"
                        @if(!empty(@old('categories')) && $category->id==@old('categories'))
                        selected=""
                        @elseif(!empty($coupondata['categories']) && in_array($category['id'], $selCats))
                        selected=""
                        @endif
                        >&nbsp;--&nbsp; {{$category['category_name']}}</option>
                    @foreach($category['subcategories'] as $subCategory)
                        <option value="{{$subCategory['id']}}"
                        @if(!empty(@old('categories')) && $subCategory->id==@old('categories'))
                        selected=""
                        @elseif(!empty($coupondata['categories']) && in_array($subCategory['id'], $selCats))
                        selected=""
                        @endif
                        >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; {{$subCategory['category_name']}}</option>
                    @endforeach
                  @endforeach
                @empty
                @endforelse
              </select>
            @error('categories')
                <div style="color:red">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Select User</label>
            <select name="users[]" id="users" class="form-control"  multiple="">
                <option Value="">Select</option>
                @forelse($users as $user)
                    <option value="{{$user['email']}}" @if(!empty($coupondata['users']) && in_array($user['email'] ,$selUsers)) selected="" @endif>
                    {{$user['email']}}</option>
                @empty
                @endforelse
            </select>
            @error('users')
            <div style="color:red">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Select Brand </label>
            <select name="brands[]" id="brand_id" class="form-control " multiple="">
                    <option Value="">Select</option>
                    @forelse($brands as $brand)
                        <option value="{{$brand['id']}}" @if(!empty($coupondata['brands']) && in_array($brand['id'] ,$selBrands)) selected="" @endif>
                        {{$brand['brands']}}</option>
                    @empty
                    @endforelse
            </select>
            @error('brands')
            <div style="color:red">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Expiry Date</label>
            <input type="date" class="form-control" name="expiry_date" id="" placeholder="Expiry Date" name="expiry_date"
            @if(!empty($coupondata['expiry_date']))
            value="{{$coupondata['expiry_date']}}"
            @else
            value="{{old('expiry_date')}}"
            @endif >
            @error('expiry_date')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{$button}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection