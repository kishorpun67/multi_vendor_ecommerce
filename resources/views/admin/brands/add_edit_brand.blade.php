@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($branddata['id'])) 
        action="{{route('admin.add.edit.brand',$branddata['id'])}}" 
        @else action="{{route('admin.add.edit.brand')}}" @endif>
          @csrf
          <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="" placeholder="Enter Brand" name="brand"
            @if(!empty($branddata['brands']))
            value="{{$branddata['brands']}}"
            @else
            value="{{old('brand')}}"
            @endif >
            @error('brand')
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