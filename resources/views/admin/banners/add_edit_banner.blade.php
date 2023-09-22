@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($bannerdata['id'])) 
        action="{{route('admin.add.edit.banner',$bannerdata['id'])}}" 
        @else action="{{route('admin.add.edit.banner')}}" @endif enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="banner_type">Banner Type</label>
            <select name="banner_type" id="" class="form-control">
              <option value="Slider" @if (!empty($bannerdata['banner_type']) && 
              $bannerdata['banner_type'] == "Slider")
              selected =""
              @endif>Slider</option>
              <option value="Fix" @if (!empty($bannerdata['banner_type']) && 
              $bannerdata['banner_type'] == "Fix")
              selected =""
              @endif>Fix</option>
            </select>
            @error('banner_type')
                <p  style="color: red">{{$message}}</p>
            @enderror
        </div>
          <div class="form-group">
            <label for="banner_image">Banner Image *</label>
            <input type="file" class="form-control" name="banner_image" id="image" >
            @if (!empty($bannerdata['banner_image']))
                <br>
                <img src="{{asset($bannerdata['banner_image'])}}" alt="" height="200" width="200"/>
            @endif
            @error('banner_image')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="brand">Banner Link</label>
            <input type="text" class="form-control" id="" placeholder="Enter Link" name="link"
            value="{{$bannerdata['link'] ?? old('link')}}">
            @error('link')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="brand">Banner Tilte</label>
            <input type="text" class="form-control" id="" placeholder="Enter Title" name="title"
            value="{{$bannerdata['title'] ?? old('title')}}">
            @error('title')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="brand">Banner Alternate Text</label>
            <input type="text" class="form-control" id="" placeholder="Enter Banner Alternate text" name="alt"
            @if(!empty($bannerdata['alt']))
            value="{{$bannerdata['alt']}}"
            @else
            value="{{old('alt')}}"
            @endif >
            @error('alt')
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