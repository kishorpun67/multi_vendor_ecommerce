@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vew Category</h4>
          <a href="{{route('admin.add.edit.category')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">Add Category</a>
          <div class="table-responsive pt-3">
            <table id="section" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Section</th>
                  <th>Parent Category</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                    @if(empty($category['parent_category']['category_name']))
                        <?php $parent_category = "Root"; ?>
                    @else
                        <?php $parent_category = $category['parent_category']['category_name']; ?>
                    @endif
                    <tr>
                        <td>{{$category['id']}}</td>
                        <td>
                          @if (!empty($category['section']['name']))
                            {{$category['section']['name']}}
                          @else
                              No Section
                          @endif
                        </td>
                        <td>{{$parent_category}}</td>
                        <td>{{$category['category_name']}}</td>
                        <td><img src="{{asset($category['category_image'])}}" alt=""></td>
                        <td>
                        @if($category['status']==1)
                            <a  class="updatecategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}"  href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-check" status="Active"></i> </i></a>
                        @else
                            <a class="updatecategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:(0);"><i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i> </a>
                        @endif
                        </td>
                        <td>
                            <a href="{{route('admin.add.edit.category', $category['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            <a href="javascript:vode(0);" rel="{{$category['id']}}" record={{'category'}}  class="delete"><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
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