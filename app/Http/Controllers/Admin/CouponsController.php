<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use Str;

class CouponsController extends Controller
{
    public function coupons()
    {
        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        if($vendorStatus = 'vendor') {
            $coupons = Coupon::where('vendor_id',$vendor_id)->get()->toArray();
        }else {
            $coupons = Coupon::get()->toArray();
        }
        Session::flash('page', 'catelogue');
        return view('admin.coupons.coupons')->with(compact('coupons'));
    }

    public function updateCouponStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =Coupon::where('id', $data['coupon_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            coupon::where('id', $data['coupon_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'coupon_id' =>$data['coupon_id']]);
        }
    }
    public function addEditCoupon(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Coupon";
            $button ="Submit";
            $coupon = new Coupon;
            $coupondata = array();
            $selCats = array();
            $selBrands = array();
            $selUsers = array();
            $message = "Coupon has been added sucessfully";
        }else{
            $title = "Edit Coupon";
            $button ="Update";
            $coupondata = Coupon::where('id',$id)->first();
            $coupondata= json_decode(json_encode($coupondata),true);
            $selCats = explode(',',$coupondata['categories']);
            $selBrands = explode(',',$coupondata['brands']);
            $selUsers = explode(',',$coupondata['users']);
            $coupon = Coupon::find($id);
            $message = "Coupon has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'categories' => 'required',
                // 'brands' => 'required',
                'expiry_date' => 'required',
                'amount' => 'required|numeric',
                'coupon_type' => 'required',
                'coupon_option' => 'required',
            ];

            $customMessages = [
                'categories.required' => 'Select categories!',
                // 'brands.required' => 'Select brands!',
                'expiry_date.required' => 'Expiry date is required!',
                'amount.required' => 'Amount is required!',
                'coupon_type.required' => 'Coupon type is required!',
                'coupon_option.required' => 'Coupon option is required!',
                'amount.numeric' => 'Enter Valid amount',
            ];
            $this->validate($request, $rules, $customMessages);

            if(isset($data['categories'])) {
                $categories = implode(', ', $data['categories']);
            } else {
                $categories ="";
            }

            if(isset($data['brands'])) {
                $brands = implode(', ', $data['brands']);
            } else {
                $brands ="";
            }     

            if(isset($data['users'])) {
                $users = implode(', ', $data['users']);
            } else {
                $users ="";
            }

            if($data['coupon_option'] == 'Automatic') {
                $coupon_code =str_random(8);
            } else {
                $coupon_code = $data['coupon_code'];
            }
            if (auth('admin')->user()->type == 'vendor') {
                $coupon->vendor_id = auth('admin')->user()->vendor_id;
            } else {
                $coupon->vendor_id = 0;
            }
            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->users = $users;
            $coupon->brands = $brands;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = 1;
            $coupon->save();
            Session::flash('success_message', $message);
            return to_route('admin.coupons');
        }
        // get section with categories and sub categories   
        $categories = Section::with(['categories'])->where('status',1)->get()->toArray();

        // get all brands 
        $brands = Brand::where('status',1)->get()->toArray();

        // get all users email 
        $users = User::select('email')->where('status',1)->get()->toArray();
        Session::flash('page', 'catelogue');
        return view('admin.coupons.add_edit_coupon', compact('title','button','coupondata', 
        'categories','users', 'brands', 'selCats', 'selBrands','selUsers'));
    }
    public function deteteCoupon($id)
    {
        Coupon::where('id', $id)->delete();
        return redirect()->back()->with('success_message','Coupon has been deleted!');
    }
}
