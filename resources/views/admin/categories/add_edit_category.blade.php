@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($categorydata['id'])) 
        action="{{route('admin.add.edit.category',$categorydata['id'])}}" 
        @else action="{{route('admin.add.edit.category')}}" @endif enctype="multipart/form-data">
          @csrf
            <div class="form-group">
            <label for="category_name">Category Name * </label>
            <input type="text" class="form-control" id="" placeholder="Enter Category Name" name="category_name"
            @if(!empty($categorydata['category_name']))
            value="{{$categorydata['category_name']}}"
            @else
            value="{{old('category_name')}}"
            @endif >
            @error('category_name')
                <p  style="color: red">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="section_id">Select Section *</label>
                <select name="section_id" id="appendCategoryLevel" class="form-control">
                    <option value="">Select</option>
                    @foreach ($sections as $section)
                    <option value="{{$section['id']}}" @if (!empty($categorydata['section_id']) && 
                        $categorydata['section_id'] == $section['id'])
                        selected =""
                        @endif>{{$section['name']}}</option>
                    @endforeach
                </select>
                @error('section_id')
                    <p  style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div id="appendCategory">
                @include('admin.categories.append_category_level')
            </div>
            <div class="form-group">
                <label for="category_image">Categoy Image</label>
                <input type="file" class="form-control" name="category_image" id="image" >
                @if (!empty($medicinedata['category_image']))
                    <br>
                    <img src="{{asset($medicinedata['category_image'])}}" alt="" height="200" width="200"/>
                @endif
            </div>
            <div class="form-group">
                <label for="category_url"> Category Url *</label>
                <input type="text" class="form-control" id="" placeholder="Enter Discount" name="category_url"
                @if(!empty($categorydata['url']))
                value="{{$categorydata['url']}}"
                @else
                value="{{old('url')}}"
                @endif >
                @error('category_url')
                    <p  style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_discount"> Category Discount</label>
                <input type="text" class="form-control" id="" placeholder="Enter Discount" name="category_discount"
                @if(!empty($categorydata['category_discount']))
                value="{{$categorydata['category_discount']}}"
                @else
                value="{{old('category_discount')}}"
                @endif >
                @error('category_discount')
                    <p  style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label> Description</label>
                <textarea class="form-control"  name="description" rows="5" id="description" placeholder="Enter ...">
                @if(!empty($categorydata['description']))
                {{$categorydata['description']}}
                @else
                {{old('description')}}
                @endif
                </textarea>
            </div>
            <div class="form-group">
                <label>Meta Keywords</label>
                <textarea class="form-control"  name="meta_keywords" rows="5" id="Meta Keywords" placeholder="Enter ...">
                @if(!empty($categorydata['meta_keywords']))
                {{$categorydata['meta_keywords']}}
                @else
                {{old('meta_keywords')}}
                @endif
                </textarea>
            </div>
            <div class="form-group">
                <label> Meta Title</label>
                <textarea class="form-control"  name="meta_title" rows="5" id="Meta Title" placeholder="Enter ...">
                    @if(!empty($categorydata['meta_title']))
                    {{$categorydata['meta_title']}}
                    @else
                    {{old('meta_title')}}
                    @endif
                </textarea>
            </div>
            <div class="form-group">
                <label>Meta Description</label>
                <textarea class="form-control"  name="meta_description" rows="5" id="Meta Description" placeholder="Enter ...">
                    @if(!empty($categorydata['meta_description']))
                    {{$categorydata['meta_description']}}
                    @else
                    {{old('meta_description')}}
                    @endif
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">{{$button}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection