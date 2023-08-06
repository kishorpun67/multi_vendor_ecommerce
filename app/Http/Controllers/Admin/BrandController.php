<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brand::get()->toArray();
        return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Brand::where('id', $data['brand_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Brand::where('id', $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'brand_id' =>$data['brand_id']]);
        }
    }
    public function addEditBrand(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Brand";
            $button ="Submit";
            $brand = new Brand;
            $branddata = array();
            $message = "Brand has been added sucessfully";
        }else{
            $title = "Edit Brand";
            $button ="Update";
            $branddata = Brand::where('id',$id)->first();
            $branddata= json_decode(json_encode($branddata),true);
            $brand = Brand::find($id);
            $message = "Brand has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'brand' => 'required',
              
            ];

            $customMessages = [
                'brand.required' => 'Brand name is required!',
            ];
            $this->validate($request, $rules, $customMessages);

            $brand->brands = $data['brand'];
            $brand->status = 1;
            $brand->save();
            Session::flash('success_message', $message);
            return to_route('admin.brands');
        }
        return view('admin.brands.add_edit_brand', compact('title','button','branddata'));
    }
    public function deteteBrand($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->back()->with('success_message','Brand has been deleted!');
    }
}
