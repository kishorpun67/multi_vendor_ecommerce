<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersProduct;
use Session;

class OrderController extends Controller
{
    public function orders($id=null)
    {
        if(empty($id)) {
            $orders = Order::with('orders_products')->orderBy('id','Desc')->where('user_id', auth()->user()->id)->get()->toArray();
            return view('front.orders.orders', compact('orders'));
        } else {
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
            return view('front.orders.order_details', compact('orderDetails'));
        }

    }
}
