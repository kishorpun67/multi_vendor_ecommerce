@extends('admin.layout.admin_layout')
@section('content')
  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">subscribers</h4>
          <a href="{{route('admin.export.subscriber')}}" style="width:auto; float:right; display:inline;" class=" btn btn-primary btn-block">Export</a>

          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>{{$subscriber['id']}}</td>
                        <td>{{$subscriber['email']}}</td>
                        <td>
                        @if($subscriber['status']==1)
                            <a  class="updatesubscriberStatus" id="subscriber-{{$subscriber['id']}}" subscriber_id="{{$subscriber['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updatesubscriberStatus" id="subscriber-{{$subscriber['id']}}" subscriber_id="{{$subscriber['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="javascript:vode(0);" rel="{{$subscriber['id']}}" record={{'subscriber'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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