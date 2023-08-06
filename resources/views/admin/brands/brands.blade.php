@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Brands</h4>
          <a href="{{route('admin.add.edit.brand')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add brand</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Brand</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{$brand['id']}}</td>
                        <td>{{$brand['brands']}}</td>
                        <td>
                        @if($brand['status']==1)
                            <a  class="updatebrandStatus" id="brand-{{$brand['id']}}" brand_id="{{$brand['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updatebrandStatus" id="brand-{{$brand['id']}}" brand_id="{{$brand['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.brand', $brand['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$brand['id']}}" record={{'brand'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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