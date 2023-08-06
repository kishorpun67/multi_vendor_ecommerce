@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
        <form class="forms-sample" method="POST" @if(!empty($filterdata['id'])) 
            action="{{route('admin.add.edit.filter',$filterdata['id'])}}" 
            @else action="{{route('admin.add.edit.filter')}}" @endif>
            @csrf
            <div class="form-group">
                <label for="parent_id">Select Category</label>
                <select name="cat_ids[]" id="" multiple="" class="form-control ">
                    @if(!empty($categories))
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}"  @if(isset($filterdata['parent_id']) && $filterdata['parent_id']==$category['id']) selected="" @endif>{{ $category['category_name'] }}</option>
                           @if(!empty($category['subcategories']))
                                @foreach($category['subcategories'] as $subcategory)
                                    <option value="{{ $subcategory['id'] }}">&nbsp;&raquo;&nbsp;{{  $subcategory['category_name'] }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('parent_id')
                    <p  style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="filter_name">Filter Name *</label>
              <input type="text" class="form-control" id="" placeholder="Enter Filter" name="filter_name"
              @if(!empty($filterdata['filter_name']))
              value="{{$filterdata['filter_name']}}"
              @else
              value="{{old('filter_name')}}"
              @endif >
              @error('filter_name')
              <p  style="color: red">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
                <label for="filter_column">Filter Name *</label>
                <input type="text" class="form-control" id="" placeholder="Enter Filter" name="filter_column"
                @if(!empty($filterdata['filter_column']))
                value="{{$filterdata['filter_column']}}"
                @else
                value="{{old('filter_column')}}"
                @endif >
                @error('filter_column')
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