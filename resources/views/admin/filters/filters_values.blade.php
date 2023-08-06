<?php 
  use App\Models\ProductsFilter;
?>
@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Filter Values</h4>
          <a href="{{route('admin.add.edit.filter.value')}}" style="width:auto; float:left; display:inline;" class="btn btn-primary btn-block">Add Filter Value</a>
          <a href="{{route('admin.filters')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">View Filters</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Filter ID</th>
                  <th>Filter Name</th>
                  <th>Filter Value</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($filtersValues as $filter)
                    <tr>
                        <td>{{$filter['id']}}</td>
                        <td>{{$filter['filter_id']}}
                        </td>
                        <td><?php echo $getFilterName = ProductsFilter::getFilterName($filter['filter_id']); ?>
                        </td>
                        <td>{{$filter['filter_value']}}</td>
                        <td>
                        @if($filter['status']==1)
                            <a  class="updateFilterValueStatus" id="filter_value-{{$filter['id']}}" filter_value_id="{{$filter['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updateFilterValueStatus" id="filter_value-{{$filter['id']}}" filter_value_id="{{$filter['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.filter.value', $filter['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$filter['id']}}" record={{'filter-value'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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