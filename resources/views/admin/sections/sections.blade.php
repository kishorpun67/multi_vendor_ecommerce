@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sections</h4>
          <a href="{{route('admin.add.edit.section')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add Section</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td>{{$section['id']}}</td>
                        <td>{{$section['name']}}</td>
                        <td>
                        @if($section['status']==1)
                            <a  class="updateSectionStatus" id="section-{{$section['id']}}" section_id="{{$section['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updateSectionStatus" id="section-{{$section['id']}}" section_id="{{$section['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.section', $section['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$section['id']}}" record={{'section'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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