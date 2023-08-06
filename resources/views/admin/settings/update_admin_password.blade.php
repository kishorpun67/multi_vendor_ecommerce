@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Setting</h4>
          <p class="card-description">
            Update Admin Password
          </p>
          <form class="forms-sample" method="POST" action="{{route('admin.update.admin.password')}}"">
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
              <label for="current_password">Current Password</label>
              <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" autocomplete="off">
              </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Change</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection