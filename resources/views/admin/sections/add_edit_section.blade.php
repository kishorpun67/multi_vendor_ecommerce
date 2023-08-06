@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$title}}</h4>
      
        <form class="forms-sample" method="POST" @if(!empty($sectiondata['id'])) 
        action="{{route('admin.add.edit.section',$sectiondata['id'])}}" 
        @else action="{{route('admin.add.edit.section')}}" @endif>
          @csrf
          <div class="form-group">
            <label for="section">Section</label>
            <input type="text" class="form-control" id="" placeholder="Section" name="section"
            @if(!empty($sectiondata['name']))
            value="{{$sectiondata['name']}}"
            @else
            value="{{old('name')}}"
            @endif >
            @error('section')
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