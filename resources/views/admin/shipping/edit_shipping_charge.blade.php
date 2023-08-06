@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($shippingdata['id'])) 
        action="{{route('admin.edit.shipping',$shippingdata['id'])}}" 
        @endif>
          @csrf
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="" placeholder="Country" name="brand" readonly
            @if(!empty($shippingdata['country']))
            value="{{$shippingdata['country']}}"
            @else
            value="{{old('country')}}"
            @endif >
            @error('country')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="0_500g">Rate (0g to 500g)</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="0_500g" 
            @if(!empty($shippingdata['0_500g']))
            value="{{$shippingdata['0_500g']}}"
            @else
            value="{{old('0_500g')}}"
            @endif >
            @error('0_500g')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="501_1000g">Rate (5001g to 1000g)</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="501_1000g" 
            @if(!empty($shippingdata['501_1000g']))
            value="{{$shippingdata['501_1000g']}}"
            @else
            value="{{old('501_1000g')}}"
            @endif >
            @error('501_1000g')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="rate">Rate (10001g to 2000g)</label>
            <input type="1001_2000g" class="form-control" id="" placeholder="Price" name="1001_2000g" 
            @if(!empty($shippingdata['1001_2000g']))
            value="{{$shippingdata['1001_2000g']}}"
            @else
            value="{{old('1001_2000g')}}"
            @endif >
            @error('1001_2000g')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="2001_5000g">Rate (2001g to 5000g)</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="2001_5000g" 
            @if(!empty($shippingdata['2001_5000g']))
            value="{{$shippingdata['2001_5000g']}}"
            @else
            value="{{old('2001_5000g')}}"
            @endif >
            @error('2001_5000g')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="above_5000g">Rate (Above 5000g)</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="above_5000g" 
            @if(!empty($shippingdata['above_5000g']))
            value="{{$shippingdata['above_5000g']}}"
            @else
            value="{{old('above_5000g')}}"
            @endif >
            @error('above_5000g')
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