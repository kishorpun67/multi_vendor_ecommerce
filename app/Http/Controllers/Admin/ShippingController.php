<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Session;

class ShippingController extends Controller
{
    
    public function shipping()
    {
        Session::put('page', 'shipping');
        $shipping_charges = ShippingCharge::get()->toArray();
        return view('admin.shipping.shipping_charges')->with(compact('shipping_charges'));
    }
    public function updateShippingStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =ShippingCharge::where('id', $data['shipping_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            ShippingCharge::where('id', $data['shipping_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'shipping_id' =>$data['shipping_id']]);
        }
    }
    public function editShipping(Request $request, $id=null)
    {
        $title = "Edit Shipping Charge";
        $button ="Update";
        $shippingdata = ShippingCharge::where('id',$id)->first();
        $shippingdata= json_decode(json_encode($shippingdata),true);
        $message = "Shipping Charge has been updated sucessfully";
        if($request->isMethod('post')) {
            $data = $request->all();
            ShippingCharge::where('id',$id)->update([
                '0_500g' => $data['0_500g'],
                '501_1000g' => $data['501_1000g'],
                '1001_2000g' => $data['1001_2000g'],
                '2001_5000g' => $data['2001_5000g'],
                'above_5000g' => $data['above_5000g'],
            ]);
            Session::flash('success_message', $message);
            return to_route('admin.shipping');
        }
        return view('admin.shipping.edit_shipping_charge', compact('title','button','shippingdata'));
    }
}
