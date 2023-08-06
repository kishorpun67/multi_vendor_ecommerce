<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersProduct;
use Session;
use App\Models\User;
use App\Models\DeliveryAddress;
use App\Models\OrderStatus;
use App\Models\ItemStatus;
use Mail;
use App\Models\OrderLog;
use Dompdf\Dompdf;

class OrderController extends Controller
{
    public function orders()
    {
        Session::put('page', 'orders');
        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        if($adminType == 'vendor') {
            $orders = Order::with(['orders_products'=>function($query) use($vendor_id){
                $query->where('vendor_id', $vendor_id);
            }])->orderBy('id','Desc')->get()->toArray();
        } else {
            $orders = Order::with('orders_products')->orderBy('id','Desc')->get()->toArray();
        }
        return view('admin.orders.orders', compact('orders'));
    }

    public function orderDetails($id=null)
    {
        Session::put('page', 'orders');
        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        if($adminType == 'vendor') {
            $orderDetails = Order::with(['orders_products'=>function($query) use($vendor_id){
                $query->where('vendor_id', $vendor_id);
            }])->where('id', $id)->first()->toArray();
        } else {
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
        }        
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();
        $deliveryAddress = DeliveryAddress::where('id', $orderDetails['user_id'])->first()->toArray();
        $orderStatus = OrderStatus::where('status', 1)->get()->toArray();
        $itemStatus = ItemStatus::where('status', 1)->get()->toArray();
        $orderLogs = OrderLog::with('orders_products')->where('order_id', $id)->orderBy('id','Desc')->get()->toArray();

        // calculate total item in cart 
        $total_items = 0;
        foreach($orderDetails['orders_products'] as $product) {
            $total_items = $total_items + $product['product_qty'];
        }
        
        // calculate item discount 
        if ($orderDetails['coupon_amount']>0) {
            $item_discount =round($orderDetails['coupon_amount']/$total_items,2);
        } else {
            $item_discount = 0;
        }
        return view('admin.orders.order_details', compact( 'item_discount', 'orderLogs','userDetails', 'orderDetails', 'deliveryAddress', 'orderStatus', 'itemStatus'));
    }
    
    public function updateOrderStatus()
    {
        $data = request()->all();
        Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status'],]); // update order status

        // update courier_name and tracking_number
        if(!empty($data['courier_name']) && !empty($data['tracking_number'])) {
            Order::where('id', $data['order_id'])->update([
                'courier_name' => $data['courier_name'],
                'tracking_number' => $data['tracking_number'],
            ]); 
        }

        // update order log 
        $log = new OrderLog;
        $log->order_id = $data['order_id'];
        $log->order_status = $data['order_status'];
        $log->save();


        // get delivery and order details 
        $delveryDetails = Order::select('name', 'email')->where('id', $data['order_id'])->first()->toArray();
        $orderDetails = Order::with('orders_products')->where('id', $data['order_id'])->first()->toArray();

        // send order status update mail 
        if(!empty($data['courier_name']) && !empty($data['tracking_number'])) {
            $email = $delveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $delveryDetails['name'],
                'order_status' => $data['order_status'],
                'order_id' => $orderDetails['id'],
                'orderDetails' => $orderDetails,
                'courier_name' => $data['courier_name'],
                'tracking_number' => $data['tracking_number'],
            ];
            Mail::send('emails.order_status', $messageData, function($message) use($email){
                $message->to($email)->subject('Order Status Updated');
            });
        } else {
            $email = $delveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $delveryDetails['name'],
                'order_status' => $data['order_status'],
                'order_id' => $orderDetails['id'],
                'orderDetails' => $orderDetails,
            ];
            Mail::send('emails.order_status', $messageData, function($message) use($email){
                $message->to($email)->subject('Order Status Updated');
            });
        }

        return redirect()->back()->with('success_message', 'Order Status has been updated successfully');
    }

    public function updateOrderItemStatus()
    {
        $data = request()->all();
        OrdersProduct::where('id', $data['item_id'])->update(['item_status' => $data['item_status']]); // update item status
        
        // update courier_name and tracking_number
        if(!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])) {
            OrdersProduct::where('id', $data['item_id'])->update([
                'courier_name' => $data['item_courier_name'],
                'tracking_number' => $data['item_tracking_number'],
            ]); 
        }

        // update order log 
        $log = new OrderLog;
        $log->order_id = $data['order_id'];
        $log->order_item_id = $data['item_id'];
        $log->order_status = $data['item_status'];
        $log->save();
        
        // get delivery and order details 
        $delveryDetails = Order::select('name', 'email')->where('id', $data['order_id'])->first()->toArray();
        $orer_item_id = $data['item_id'];
        $orderDetails = Order::with(['orders_products'=>function($query) use($orer_item_id){
            $query->where('id', $orer_item_id);
        }])->where('id', $data['order_id'])->first()->toArray();

        // send order status update mail 
        if(!empty($data['item_tracking_number']) && !empty($data['item_tracking_number'])) {
            $email = $delveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $delveryDetails['name'],
                'order_status' => $data['item_status'],
                'order_id' => $orderDetails['id'],
                'orderDetails' => $orderDetails,
                'courier_name' => $data['item_tracking_number'],
                'tracking_number' => $data['item_tracking_number'],
            ];
            Mail::send('emails.order_item_status', $messageData, function($message) use($email){
                $message->to($email)->subject('Order Status Updated');
            });
        } else {
            $email = $delveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $delveryDetails['name'],
                'order_status' => $data['item_status'],
                'order_id' => $orderDetails['id'],
                'orderDetails' => $orderDetails,
            ];
            Mail::send('emails.order_item_status', $messageData, function($message) use($email){
                $message->to($email)->subject('Order Status Updated');
            });
        }
        return redirect()->back()->with('success_message', 'Order Item Status has been updated successfully');
    }

    public function orderInvoice($id=null) 
    {
        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        if($adminType == 'vendor') {
            $orderDetails = Order::with(['orders_products'=>function($query) use($vendor_id){
                $query->where('vendor_id', $vendor_id);
            }])->where('id', $id)->first()->toArray();
        } else {
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
        }     
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();
        return view('admin.orders.order_invoice', compact('orderDetails', 'userDetails'));

    }

    public function orderInvoicePdf($id)
    {
        $adminType = auth('admin')->user()->type;
        $vendor_id = auth('admin')->user()->vendor_id;
        if($adminType == "vendor") {
            $vendorStatus = auth('admin')->user()->status;
            if($vendorStatus ==0) {
                return  to_route('admin.update.vendor.details', 'business');
            }
        }
        if($adminType == 'vendor') {
            $orderDetails = Order::with(['orders_products'=>function($query) use($vendor_id){
                $query->where('vendor_id', $vendor_id);
            }])->where('id', $id)->first()->toArray();
        } else {
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
        }     
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();


        $invoiceHtml  = '<!DOCTYPE html>
        <html>
        <head>
            <title>HTML to API - Invoice</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta http-equiv="content-type" content="text-html; charset=utf-8">
            <style type="text/css">
                html, body, div, span, applet, object, iframe,
                h1, h2, h3, h4, h5, h6, p, blockquote, pre,
                a, abbr, acronym, address, big, cite, code,
                del, dfn, em, img, ins, kbd, q, s, samp,
                small, strike, strong, sub, sup, tt, var,
                b, u, i, center,
                dl, dt, dd, ol, ul, li,
                fieldset, form, label, legend,
                table, caption, tbody, tfoot, thead, tr, th, td,
                article, aside, canvas, details, embed,
                figure, figcaption, footer, header, hgroup,
                menu, nav, output, ruby, section, summary,
                time, mark, audio, video {
                    margin: 0;
                    padding: 0;
                    border: 0;
                    font: inherit;
                    font-size: 100%;
                    vertical-align: baseline;
                }
        
                html {
                    line-height: 1;
                }
        
                ol, ul {
                    list-style: none;
                }
        
                table {
                    border-collapse: collapse;
                    border-spacing: 0;
                }
        
                caption, th, td {
                    text-align: left;
                    font-weight: normal;
                    vertical-align: middle;
                }
        
                q, blockquote {
                    quotes: none;
                }
                q:before, q:after, blockquote:before, blockquote:after {
                    content: "";
                    content: none;
                }
        
                a img {
                    border: none;
                }
        
                article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
                    display: block;
                }
        
                body {
                    font-family: "Source Sans Pro", sans-serif;
                    font-weight: 300;
                    font-size: 12px;
                    margin: 0;
                    padding: 0;
                }
                body a {
                    text-decoration: none;
                    color: inherit;
                }
                body a:hover {
                    color: inherit;
                    opacity: 0.7;
                }
                body .container {
                    min-width: 500px;
                    margin: 0 auto;
                    padding: 0 20px;
                }
                body .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                }
                body .left {
                    float: left;
                }
                body .right {
                    float: right;
                }
                body .helper {
                    display: inline-block;
                    height: 100%;
                    vertical-align: middle;
                }
                body .no-break {
                    page-break-inside: avoid;
                }
        
                header {
                    margin-top: 20px;
                    margin-bottom: 50px;
                }
                header figure {
                    float: left;
                    width: 60px;
                    height: 60px;
                    margin-right: 10px;
                    background-color: #8BC34A;
                    border-radius: 50%;
                    text-align: center;
                }
                header figure img {
                    margin-top: 13px;
                }
                header .company-address {
                    float: left;
                    max-width: 150px;
                    line-height: 1.7em;
                }
                header .company-address .title {
                    color: #8BC34A;
                    font-weight: 400;
                    font-size: 1.5em;
                    text-transform: uppercase;
                }
                header .company-contact {
                    float: right;
                    height: 60px;
                    padding: 0 10px;
                    background-color: #8BC34A;
                    color: white;
                }
                header .company-contact span {
                    display: inline-block;
                    vertical-align: middle;
                }
                header .company-contact .circle {
                    width: 20px;
                    height: 20px;
                    background-color: white;
                    border-radius: 50%;
                    text-align: center;
                }
                header .company-contact .circle img {
                    vertical-align: middle;
                }
                header .company-contact .phone {
                    height: 100%;
                    margin-right: 20px;
                }
                header .company-contact .email {
                    height: 100%;
                    min-width: 100px;
                    text-align: right;
                }
        
                section .details {
                    margin-bottom: 55px;
                }
                section .details .client {
                    width: 50%;
                    line-height: 20px;
                }
                section .details .client .name {
                    color: #8BC34A;
                }
                section .details .data {
                    width: 50%;
                    text-align: right;
                }
                section .details .title {
                    margin-bottom: 15px;
                    color: #8BC34A;
                    font-size: 3em;
                    font-weight: 400;
                    text-transform: uppercase;
                }
                section table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    font-size: 0.9166em;
                }
                section table .qty, section table .unit, section table .total {
                    width: 15%;
                }
                section table .desc {
                    width: 55%;
                }
                section table thead {
                    display: table-header-group;
                    vertical-align: middle;
                    border-color: inherit;
                }
                section table thead th {
                    padding: 5px 10px;
                    background: #8BC34A;
                    border-bottom: 5px solid #FFFFFF;
                    border-right: 4px solid #FFFFFF;
                    text-align: right;
                    color: white;
                    font-weight: 400;
                    text-transform: uppercase;
                }
                section table thead th:last-child {
                    border-right: none;
                }
                section table thead .desc {
                    text-align: left;
                }
                section table thead .qty {
                    text-align: center;
                }
                section table tbody td {
                    padding: 10px;
                    background: #E8F3DB;
                    color: #777777;
                    text-align: right;
                    border-bottom: 5px solid #FFFFFF;
                    border-right: 4px solid #E8F3DB;
                }
                section table tbody td:last-child {
                    border-right: none;
                }
                section table tbody h3 {
                    margin-bottom: 5px;
                    color: #8BC34A;
                    font-weight: 600;
                }
                section table tbody .desc {
                    text-align: left;
                }
                section table tbody .qty {
                    text-align: center;
                }
                section table.grand-total {
                    margin-bottom: 45px;
                }
                section table.grand-total td {
                    padding: 5px 10px;
                    border: none;
                    color: #777777;
                    text-align: right;
                }
                section table.grand-total .desc {
                    background-color: transparent;
                }
                section table.grand-total tr:last-child td {
                    font-weight: 600;
                    color: #8BC34A;
                    font-size: 1.18181818181818em;
                }
        
                footer {
                    margin-bottom: 20px;
                }
                footer .thanks {
                    margin-bottom: 40px;
                    color: #8BC34A;
                    font-size: 1.16666666666667em;
                    font-weight: 600;
                }
                footer .notice {
                    margin-bottom: 25px;
                }
                footer .end {
                    padding-top: 5px;
                    border-top: 2px solid #8BC34A;
                    text-align: center;
                }
            </style>
        </head>
        
        <body>
            <header class="clearfix">   
                <div class="container">
                    <div class="company-address">
                        <h2 class="title">Multi Vendor</h2>
                        <p>
                            18 - Nakhu <br>
                            Lalitpur Nepal
                        </p>
                    </div>
                    <div class="company-contact">
                        <div class="email right">
                            <span class="circle"><img src="data:image/svg+xml;charset=utf-8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIg0KCSB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE0LjE3M3B4Ig0KCSBoZWlnaHQ9IjE0LjE3M3B4IiB2aWV3Qm94PSIwLjM1NCAtMi4yNzIgMTQuMTczIDE0LjE3MyIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwLjM1NCAtMi4yNzIgMTQuMTczIDE0LjE3MyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSINCgk+DQo8dGl0bGU+ZW1haWwxOTwvdGl0bGU+DQo8ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz4NCjxnIGlkPSJQYWdlLTEiIHNrZXRjaDp0eXBlPSJNU1BhZ2UiPg0KCTxnIGlkPSJJTlZPSUNFLTEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MTcuMDAwMDAwLCAtNTUuMDAwMDAwKSIgc2tldGNoOnR5cGU9Ik1TQXJ0Ym9hcmRHcm91cCI+DQoJCTxnIGlkPSJaQUdMQVZMSkUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMwLjAwMDAwMCwgMTUuMDAwMDAwKSIgc2tldGNoOnR5cGU9Ik1TTGF5ZXJHcm91cCI+DQoJCQk8ZyBpZD0iS09OVEFLVEkiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI2Ny4wMDAwMDAsIDM1LjAwMDAwMCkiIHNrZXRjaDp0eXBlPSJNU1NoYXBlR3JvdXAiPg0KCQkJCTxnIGlkPSJPdmFsLTEtX3gyQl8tZW1haWwxOSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTE3LjAwMDAwMCwgMC4wMDAwMDApIj4NCgkJCQkJPHBhdGggaWQ9ImVtYWlsMTkiIGZpbGw9IiM4QkMzNEEiIGQ9Ik0zLjM1NCwxNC4yODFoMTQuMTczVjUuMzQ2SDMuMzU0VjE0LjI4MXogTTEwLjQ0LDEwLjg2M0w0LjYyNyw2LjAwOGgxMS42MjZMMTAuNDQsMTAuODYzDQoJCQkJCQl6IE04LjEyNSw5LjgxMkw0LjA1LDEzLjIxN1Y2LjQwOUw4LjEyNSw5LjgxMnogTTguNjUzLDEwLjI1M2wxLjc4OCwxLjQ5M2wxLjc4Ny0xLjQ5M2w0LjAyOSwzLjM2Nkg0LjYyNEw4LjY1MywxMC4yNTN6DQoJCQkJCQkgTTEyLjc1NSw5LjgxMmw0LjA3NS0zLjQwM3Y2LjgwOEwxMi43NTUsOS44MTJ6Ii8+DQoJCQkJPC9nPg0KCQkJPC9nPg0KCQk8L2c+DQoJPC9nPg0KPC9nPg0KPC9zdmc+DQo=" alt=""><span class="helper"></span></span>
                            <a href="mailto:company@example.com">company@example.com</a>
                            <span class="helper"></span>
                        </div>
                    </div>
                </div>
            </header>
        
            <section>
                <div class="container">
                    <div class="details clearfix">
                        <div class="client left">
                            <p>INVOICE TO:</p>
                            
                            <p class="name">'. $orderDetails['name'] .'</p>
                            <p class="address">'. $orderDetails['address'] .'</p>
                            <p class="state">'. $orderDetails['state'] .'</p>
                            <p class="city">'. $orderDetails['city'] .'</p>
                            <p class="country">'. $orderDetails['country'] .'</p>
                            <p class="pincode">'. $orderDetails['pincode'] .'</p>
                            <p class="mobile">'. $orderDetails['mobile'] .'</p>
                            <a href="mailto:'. $orderDetails['email'] .'">'. $orderDetails['email'] .'</a>
                        </div>
                        <div class="data right">
                            <div class="title">Invoice 3-2-1</div>
                            <div class="date">
                                Date of Invoice: '.date('y-m-d h:i:s', strtotime($orderDetails['created_at'])).'<br>
                                Order Status: '.$orderDetails['order_status'].'<br>
                                Payment Method: '.$orderDetails['payment_method'].'<br>
                            </div>
                        </div>
                    </div>
        
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th class="product_code">Product Code</th>
                                <th class="size">Size</th>
                                <th class="color">Color</th>
                                <th class="unit_price"> Unit Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $sub_total = 0;
                            foreach($orderDetails['orders_products'] as $product) {
                                $invoiceHtml .= '<tr>
                                <td class="product_code">'.$product['product_code'].'</td>
                                <td class="product_size">'.$product['product_size'].'</td>
                                <td class="product_color">'.$product['product_color'].'</td>
                                <td class="product_price">Rs.'.$product['product_price'].'</td>
                                <td class="product_qty">'.$product['product_qty'].'</td>
                                <td class="product_qty">Rs.'.$product['product_qty'] * $product['product_price'].'</td>
                                </tr> ';
                                $sub_total =  $sub_total + ($product['product_qty'] * $product['product_price']);
                            }

                        $invoiceHtml .= '</tbody>
                    </table>
                    <div class="no-break">
                        <table class="grand-total">
                            <tbody>
                                <tr>
                                    <td class="desc"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="unit">SUBTOTAL:</td>
                                    <td class="total">Rs.'.$sub_total.'</td>
                                </tr>
                                <tr>
                                    <td class="desc"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="unit">Discount</td>
                                    <td class="total">Rs.'.$orderDetails['coupon_amount'].'</td>
                                </tr>
                                <tr>
                                    <td class="desc"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="unit">Shipping</td>
                                    <td class="total">Rs.'.$orderDetails['shipping_charges'].'</td>
                                </tr>
                                <tr>
                                    <td class="desc"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="qty"></td>
                                    <td class="unit">Grand Total</td>
                                    <td class="total">Rs.'.$orderDetails['grand_total'].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <footer>
                <div class="container">
                    <div class="thanks">Thank you!</div>
                    <div class="notice">
                        <div>NOTICE:</div>
                        <div>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                    </div>
                    <div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>
                </div>
            </footer>
        
        </body>
        
        </html>
        ';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($invoiceHtml);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
        return view('admin.orders.', compact('orderDetails', 'userDetails'));

    }
}
