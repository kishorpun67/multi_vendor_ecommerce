<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryAddress;
use App\Models\Country;
use View;

class AddressController extends Controller
{
    public function getDeliveryAddress()
    {
        if(request()->ajax()) {
            $data = request()->all();
            $deliveryAddress = DeliveryAddress::where('id', $data['addressid'])->first()->toArray();
            return response()->json($deliveryAddress, 200);
        }
    }

    public function saveDeliveryAddress()
    {
        if(request()->ajax()) {
            $data = request()->all();

            if(empty($data['delivery_name']) || empty($data['delivery_address']) || empty($data['delivery_city']) 
            || empty($data['delivery_state']) || empty($data['delivery_country']) || empty($data['delivery_mobile'])
            || empty($data['delivery_pincode'])) {
                $message ='Please! fill all fields to checkout!';
            // get delivery address 
            $deliveryAddress = DeliveryAddress::deliveryAddress();

            // get countries 
            $countries = Country::get();                
            return response()->json([
                    'status' =>false, 
                    'message' => $message,
                    'deliveryAddress'=>$deliveryAddress,
                    'view'=>(String)View::make('front.products.delivery_addresses')
                    ->with(compact('deliveryAddress', 'countries')),
                    
                ]);            }
            if ($data['delivery_id'] >0) {
                $deliveryAddress = DeliveryAddress::where('id', $data['delivery_id'])->first();
                $message = 'Delivery Addres has been updated successfully';
            } else {
                $deliveryAddress = new DeliveryAddress();
                $message = 'Delivery Addres has been added successfully';

            }
            $deliveryAddress->user_id = auth()->user()->id;
            $deliveryAddress->name = $data['delivery_name'];
            $deliveryAddress->address = $data['delivery_address'];
            $deliveryAddress->city = $data['delivery_city'];
            $deliveryAddress->state = $data['delivery_state'];
            $deliveryAddress->country = $data['delivery_country'];
            $deliveryAddress->pincode = $data['delivery_pincode'];
            $deliveryAddress->mobile = $data['delivery_mobile'];
            $deliveryAddress->save();
            
            // get delivery address 
            $deliveryAddress = DeliveryAddress::deliveryAddress();

            // get countries 
            $countries = Country::get();

            return response()->json([
                'status' =>true, 
                'message' => $message,
                'deliveryAddress'=>$deliveryAddress,
                'view'=>(String)View::make('front.products.delivery_addresses')
                ->with(compact('deliveryAddress', 'countries')),
                
            ]);
        }
    }
    public function removeDeliveryAddress()
    {
        if(request()->ajax()) {
            $data = request()->all();
            DeliveryAddress::where('id', $data['addressid'])->delete(); // delete delivery address
            $message = 'Delivery address has been deleted successfully';
            
            // get delivery address 
            $deliveryAddress = DeliveryAddress::deliveryAddress();

            // get countries 
            $countries = Country::get();

            return response()->json([
                'status' =>true, 
                'message' => $message,
                'deliveryAddress'=>$deliveryAddress,
                'view'=>(String)View::make('front.products.delivery_addresses')
                ->with(compact('deliveryAddress', 'countries')),
                
            ]);
        }
    }
}
