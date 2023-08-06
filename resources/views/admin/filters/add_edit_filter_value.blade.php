@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
        <form class="forms-sample" method="POST" @if(!empty($filtervaluedata['id'])) 
            action="{{route('admin.add.edit.filter.value',$filtervaluedata['id'])}}" 
            @else action="{{route('admin.add.edit.filter.value')}}" @endif>
            @csrf
            <div class="form-group">
                <label for="filter_id">Select Filter *</label>
                <select class='form-control' name="filter_id" id="filter_id">
                    <option value="">Select</option>
                    @foreach ($filters as $filter)
                        <option value="{{$filter['id']}}"
                        @if (!empty($filtervaluedata['filter_id']) && $filtervaluedata['filter_id'] == $filter['id'])
                            selected
                        @else
                            
                        @endif
                        >{{$filter['filter_name']}}</option>
                    @endforeach

                </select >
                @error('filter_id')
                <p  style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="filter_value">Filter Value *</label>
              <input type="text" class="form-control" id="" placeholder="Enter Filter" name="filter_value"
              @if(!empty($filtervaluedata['filter_value']))
              value="{{$filtervaluedata['filter_value']}}"
              @else
              value="{{old('filter_value')}}"
              @endif >
              @error('filter_value')
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