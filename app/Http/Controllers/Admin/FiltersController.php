<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;
use App\Models\Category;
Use Session;
use DB;
use View;

class FiltersController extends Controller
{
    public function filters()
    {
        $filters = ProductsFilter::get()->toArray();
        return view('admin.filters.filters')->with(compact('filters'));
    }

    public function filtersValues()
    {
        $filtersValues = ProductsFiltersValue::get()->toArray();
        return view('admin.filters.filters_values')->with(compact('filtersValues'));
    }

    public function updateFilterStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =ProductsFilter::where('id', $data['filter_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ProductsFilter::where('id', $data['filter_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'filter_id' =>$data['filter_id']]);
        }
    }
    
    public function updateFilterValueStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =ProductsFiltersValue::where('id', $data['filter_value_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ProductsFiltersValue::where('id', $data['filter_value_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'filter_value_id' =>$data['filter_value_id']]);
        }
    }
    public function addEditFilter(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Filter";
            $button ="Submit";
            $filter = new ProductsFilter;
            $filterdata = array();
            $message = "Filter has been added sucessfully";
        }else{
            $title = "Edit Filter";
            $button ="Update";
            $filterdata = ProductsFilter::where('id',$id)->first();
            $filterdata= json_decode(json_encode($filterdata),true);
            $filter = ProductsFilter::find($id);
            $message = "Filter has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'filter_name' => 'required',
                'filter_column' => 'required',

              
            ];

            $customMessages = [
                'filter_name.required' => 'filter name is required!',
                'filter_column.required' => 'filter column is required!',

            ];
            $this->validate($request, $rules, $customMessages);
            $cat_ids = implode(',', $data['cat_ids']);

            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->cat_ids = $cat_ids;
            $filter->status = 1;
            $filter->save();
            DB::statement('Alter table products add '.$data['filter_column'].' varchar(255) after description');
            Session::flash('success_message', $message);
            return to_route('admin.filters');
        }
        $categories = Category::with('subcategories')->where(['parent_id' =>0, 'status'=>1])->get()->toArray();
        return view('admin.filters.add_edit_filter', compact('title','button','filterdata', 'categories'));
    }

    public function addEditFilterValue (Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Product Filter Value";
            $button ="Submit";
            $filter = new ProductsFiltersValue;
            $filtervaluedata = array();
            $message = "Product Filter Value has been added sucessfully";
        }else{
            $title = "Edit Product Filter Value";
            $button ="Update";
            $filtervaluedata = ProductsFiltersValue::where('id',$id)->first();
            $filtervaluedata= json_decode(json_encode($filtervaluedata),true);
            $filter = ProductsFiltersValue::find($id);
            $message = "Product Filter Value has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'filter_id' => 'required',
                'filter_value' => 'required',

              
            ];

            $customMessages = [
                'filter_id.required' => 'filter name is required!',
                'filter_value.required' => 'filter value is required!',

            ];
            $this->validate($request, $rules, $customMessages);
            $filter->filter_id = $data['filter_id'];
            $filter->filter_value = $data['filter_value'];
            $filter->status = 1;
            $filter->save();
            Session::flash('success_message', $message);
            return to_route('admin.filters.values');
        }
        $filters = ProductsFilter::where('status',1)->get()->toArray();
        return view('admin.filters.add_edit_filter_value', compact('title','button','filters' ,'filtervaluedata'));
    }
    public function deteteFilter($id)
    {
        ProductsFilter::where('id', $id)->delete();
        return redirect()->back()->with('success_message','filter has been deleted!');
    }

    public function categoryFilter()
    {
        $data = request()->all();
        $category_id = $data['category_id'];
        return response()->json(['view'=>(String)View::make('admin.filters.category_filters')->
        with(compact('category_id'))]);
        
    }
}
