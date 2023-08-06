@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Users</h4>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Pincode</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Status</th>
                  {{-- <th>Actions</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['address']}}</td>
                        <td>{{$user['city']}}</td>
                        <td>{{$user['state']}}</td>
                        <td>{{$user['country']}}</td>
                        <td>{{$user['pincode']}}</td>
                        <td>{{$user['mobile']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>
                        @if($user['status']==1)
                            <a  class="updateuserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updateuserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        {{-- <td>
                            <a href="javascript:vode(0);" rel="{{$user['id']}}" record={{'user'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
                        </td> --}}
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection