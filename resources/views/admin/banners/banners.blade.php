@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Banner</h4>
          <a href="{{route('admin.add.edit.banner')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add Banner</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Image</th>
                  <th>Type</th>
                  <th>Link</th>
                  <th>Title</th>
                  <th>Alt</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{$banner['id']}}</td>
                        <td><img src="{{asset($banner['image'])}}" alt=""></td>
                        <td>{{$banner['banner_type']}}</td>
                        <td>{{$banner['link']}}</td>
                        <td>{{$banner['title']}}</td>
                        <td>{{$banner['alt']}}</td>
                        <td>
                        @if($banner['status']==1)
                            <a  class="updatebannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updatebannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.banner', $banner['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$banner['id']}}" record={{'banner'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
                        </td>
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