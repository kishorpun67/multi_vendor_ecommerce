@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Setting</h4>
          <p class="card-description">
            Update Admin Detail
          </p>
          <form class="forms-sample" method="POST" action="{{route('admin.update.admin.details')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{auth("admin")->user()->email}}" >
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="" id="" class="form-control" id="type"  value="{{auth("admin")->user()->type}}" readonly>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off" value="{{auth("admin")->user()->name}}">
            </div>
            <div class="form-group">
              <label for="Mobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile" autocomplete="off" value="{{auth("admin")->user()->mobile}}">
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image" value="{{auth("admin")->user()->image}}">
              @if (!empty(auth("admin")->user()->image))
                <a href="{{asset(auth('admin')->user()->image)}}" target="_blank" rel="noopener noreferrer">View</a>
              @endif
            </div>
            <button type="submit" class="btn btn-primary mr-2">Change</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection